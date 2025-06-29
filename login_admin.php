<?php
session_start();
$conn = new mysqli("localhost", "root", "", "car_rental");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = $conn->prepare("SELECT admin_ID, name, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($admin_ID, $name, $hashed_password);
        $stmt->fetch();
        if ($password === $hashed_password) {
            $_SESSION['admin_ID'] = $admin_ID;
            $_SESSION['name'] = $name;
            header("Location: dashbord.php"); 
            exit();
        } else {
            echo "⚠ كلمة المرور غير صحيحة.";
        }
    } else {
        echo "⚠ لم يتم العثور على البريد الإلكتروني.";
    }

    $stmt->close();
}

$conn->close();
?>
