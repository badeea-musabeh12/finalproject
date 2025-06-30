<?php
session_start();
if (!isset($_SESSION['role'])) {
    // header("Location: admin.php");
    echo "لا تملك صلاحية الوصول لهذه الصفحة.";
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    echo "لا تملك صلاحية الوصول لهذه الصفحة.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
    }
    .navbar {
            background-color: #38a6dd;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 14px 20px;
        }
        .navbar img {
            width: auto;
            height: 150px;
            margin-right: 5px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            text-align: center;
            margin: 0 50px;
            font-size: 30px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            transition: color 0.3s;
        }
        .navbar a:hover {
            background-color: #38a6dd;
            border-radius: 50px;
            color: #010415;
        }
  </style>
</head>
<body>

  <div class="navbar">
    <h1>Admin Dashboard</h1>
    <a href="logout.php" class="logout-btn">Log Out</a>
  </div>
 <?php
  include_once('menu.php');
 ?>

  <div class="main">
    <h2>Welcome to the Admin Dashboard</h2>
    <p>Select a page from the sidebar</p>
  </div>

</body>
</html>