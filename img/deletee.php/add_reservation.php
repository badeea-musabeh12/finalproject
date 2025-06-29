<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>إدارة الحجوزات</title>
  
  </style>
</head>
<body>

<h2>قائمة الحجوزات</h2>

<?php
require_once('connect.php');

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM reservations WHERE reservations_ID = $delete_id";
    mysqli_query($conn, $delete_sql);
    echo "<p style='color: green;'>تم حذف الحجز بنجاح.</p>";
}

$sql = "SELECT * FROM reservations";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>رقم الحجز</th>
            <th>رقم السيارة</th>
            <th>رقم الزبون</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
            <th>السعر الإجمالي</th>
            <th>عداد البداية</th>
            <th>عداد النهاية</th>
            <th>إجراء</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['reservations_ID']}</td>
                <td>{$row['car_ID']}</td>
                <td>{$row['customer_ID']}</td>
                <td>{$row['startdate']}</td>
                <td>{$row['endDate']}</td>
                <td>{$row['totalPrice']}</td>
                <td>{$row['counter_start']}</td>
                <td>{$row['counter_end']}</td>
                <td>
                  <a href='?delete_id={$row['reservations_ID']}' onclick=\"return confirm('هل أنت متأكد من حذف هذا الحجز؟');\">
                    <button class='btn-delete'>🗑️ حذف</button>
                  </a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>لا توجد حجوزات حالياً.</p>";
}
?>

</body>
</html>
