<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "car_rental"; 


$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}


$sql = "INSERT INTO renters 
(full_name, nationality, address, telephone, id_no, birth_date, driver_licence_no, licence_issue_date, licence_exp_date)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss",
    $_POST['full_name'],
    $_POST['nationality'],
    $_POST['address'],
    $_POST['telephone'],
    $_POST['id_no'],
    $_POST['birth_date'],
    $_POST['driver_licence_no'],
    $_POST['licence_issue_date'],
    $_POST['licence_exp_date']
);


if ($stmt->execute()) {
    echo "✅ تم الحفظ بنجاح.";
} else {
    echo "❌ خطأ في الحفظ: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>