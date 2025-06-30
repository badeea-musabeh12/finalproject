 <?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }

        .form {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 60px;
            max-width: 600px;
            margin: auto;
            text-align: left;
        }

        h1 {
            text-align: center; /* توسيط العنوان */
            color: #38a6dd; /* لون النص */
            margin-bottom: 20px; /* مسافة أسفل العنوان */
            font-size: 24px; /* حجم الخط */
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s;
            text-align: left;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #38a6dd;
            outline: none;
        }

        input[type="submit"] {
            background-color: #38a6dd;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #28a6dd;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    require_once('connect.php');
    $sql = "SELECT * FROM admin WHERE username = '$user' AND  password = '$pass'";
    $res_admin = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res_admin) > 0){
        $row_admin = mysqli_fetch_array($res_admin);
        $_SESSION['id'] = $row_admin['admin_ID'];
        $_SESSION['name'] = $row_admin['name'];
        $_SESSION['username'] = $row_admin['username'];
        $_SESSION['role'] = 'admin';
        header ('location:car.php');
    } else {
        echo '<div class="error">Incorrect username or password</div>';
    }
}
?>

<form method="post" class="form">
    <h1>log in</h1>

    <div>
        <label for="user">username</label>
        <input type="text" name="user" id="user">
    </div>
    <div>
        <label for="pass">password</label>
        <input type="password" name="pass" id="pass">
    </div>
    <div>
        <input type="submit" value="login">
    </div>
</form>

</body>
</html>