<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<?php
  include_once('include/header.php');
  include_once('include/menu.php');
?>

<div class="btn">
  <a href="car_add.php">إضافة سيارة جديد</a>
</div>

<table class="show">
  <tr>
    <th>#</th>
    <th>الاسم</th>
    <th colspan="2">العمليات</th>
  </tr>
  <?php
    require_once('include/connect.php');
    $sql = "SELECT * FROM car";
    $res_author = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res_author) > 0) {
      $i = 1;
      while ($row_author = mysqli_fetch_assoc($res_car)) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $row_author['name'] . "</td>";
        echo "<td>";
        echo "<div class='btn'><a href='author_edit.php?id=" . $row_car['id'] . "'>تعديل</a></div>";
        echo "</td>";
        echo "<td>";
        echo "<div class='btn'><a href='author_delete.php?id=" . $row_car['id'] . "'>حذف</a></div>";
        echo "</td>";
        echo "</tr>";
        $i++;
      }
    } else {
      echo "<tr><td colspan='3'>لا توجد بيانات لعرضها</td></tr>";
    }
  ?>
</table>

<?php
  include_once('include/footer.php');
?>
</body>
</html>
