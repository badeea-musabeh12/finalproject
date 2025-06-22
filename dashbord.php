<?php
session_start();
if (!isset($_SESSION['admin_ID'])) {
  header("Location: login_admin.php");
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
    * {
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    body {
      margin: 0;
      background: #f4f9fc;
    }
    .navbar {
      background-color: #31ADE7;
      color: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .navbar h1 {
      margin: 0;
      font-size: 24px;
    }
    .navbar a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .sidebar {
      width: 200px;
      background-color: #ffffff;
      position: fixed;
      top: 60px;
      bottom: 0;
      border-right: 1px solid #e0e0e0;
      padding: 20px;
    }
    .sidebar a {
      display: block;
      margin: 10px 0;
      color: #333;
      text-decoration: none;
      padding: 8px;
      border-radius: 8px;
      transition: background 0.3s;
      font-weight: bold;
    }
    .sidebar a:hover {
      background-color: #31ADE7;
      color: white;
    }
    .main {
      margin-left: 220px;
      padding: 30px;
    }
    iframe {
      width: 100%;
      height: 80vh;
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      background-color: white;
    }
    .logout-btn {
      background-color: #ffffff;
      color: #31ADE7;
      border: 2px solid #ffffff;
      padding: 6px 12px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
    }
    .logout-btn:hover {
      background-color: #ffffff;
      color: red;
      border-color: red;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <h1>Admin Dashboard</h1>
    <a href="logout_admin.php" class="logout-btn">Log Out</a>
  </div>

  <div class="sidebar">
    <a href="#" onclick="loadPage('home_welcome.php')">🏠 Home</a>
    <a href="#" onclick="loadPage('car_index.php')">🚗 Cars</a>
    <a href="#" onclick="loadPage('reservations.php')">📋 Reservations</a>
    <a href="#" onclick="loadPage('clients.php')">👤 Clients</a>
    <a href="#" onclick="loadPage('settings.php')">⚙️ Settings</a>
  </div>

  <div class="main">
    <iframe id="content-frame" src="home_welcome.php"></iframe>
  </div>

  <script>
    function loadPage(page) {
      document.getElementById("content-frame").src = page;
    }
  </script>

</body>
</html>
