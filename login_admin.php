<?php
session_start();

// 1. Connect to database
$conn = new mysqli("localhost", "root", "", "car_rental");

// 2. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Handle login request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // 🔐 MD5 hash

    // 4. Prepare statement
    $stmt = $conn->prepare("SELECT admin_ID, name, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // 5. Check if admin exists
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($admin_ID, $name, $hashed_password);
        $stmt->fetch();

        // 6. Compare password hashes
        if ($password === $hashed_password) {
            $_SESSION['admin_ID'] = $admin_ID;
            $_SESSION['name'] = $name;
            header("Location: dashbord.php"); // ✅ Redirect to admin dashboard
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
