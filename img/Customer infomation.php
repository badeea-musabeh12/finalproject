<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customer Information</title>
  <style>
    body {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      margin: 0;
      padding: 0;
      background-color: #ffffff;
    }
    .navbar {
      background-color: #38a6dd;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
    }
    .navbar img {
      height: 80px;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      padding: 14px 30px;
      font-size: 20px;
      margin: 0 10px;
      font-family: Georgia, 'Times New Roman', Times, serif;
      border-radius: 50px;
      transition: color 0.3s, background-color 0.3s;
    }
    .navbar a:hover {
      background-color: white;
      color: #010415;
    }
    .login-btn {
      background-color: white;
      color: #38a6dd;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }
    .login-btn:hover {
      background-color: #38a6dd;
      color: white;
    }
    main {
      padding: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      background-color: #f0f8ff;
    }
    .field {
      border: 2px solid #38a6dd;
      background-color: #a5abb1;
      padding: 15px;
      border-radius: 8px;
      width: 300px;
      box-sizing: border-box;
      color: white;
    }
    .field label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      font-size: 16px;
    }
    .reserve-btn {
      margin-top: 10px;
      background-color: white;
      color: #38a6dd;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    .reserve-btn.clicked {
      background-color: #38a6dd;
      color: white;
    }
    footer {
      background-color: #38a6dd;
      padding: 20px 0;
      text-align: center;
      margin-top: 40px;
    }
    footer button {
      background-color: white;
      color: #38a6dd;
      border: none;
      padding: 10px 20px;
      margin: 0 15px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
    }
    footer button:hover {
      background-color: #38a6dd;
      color: white;
    }
  </style>
</head>
<body>

  <header class="navbar">
    <img src="https://th.bing.com/th/id/OIP.t-7iaRmQPW-S6g1EPlbR7AHaHa?rs=1&pid=ImgDetMain&cb=idpwebpc1" alt="Logo" />
    <div>
      <a href="#">Home</a>
      <a href="index2.html">Cars</a>
      <a href="#">Location</a>
      <a href="index4.html">Contact Us</a>
      <button class="login-btn">Login</button>
    </div>
  </header>

  <main>
    <?php
    $cars = [
        ['model' => 'Toyota Yaris', 'plate' => 'XYZ-123'],
        ['model' => 'Hyundai Elantra', 'plate' => 'ABC-456'],
        ['model' => 'Kia Sportage', 'plate' => 'LMN-789'],
    ];

    foreach ($cars as $car) {
        echo '<div class="field">';
        echo '<label>Car: ' . htmlspecialchars($car['model']) . '</label>';
        echo '<label>License Plate: ' . htmlspecialchars($car['plate']) . '</label>';
        echo '<button class="reserve-btn" onclick="changeColor(this)">Reserve</button>';
        echo '</div>';
    }
    ?>
  </main>

  <footer>
    <button>About Us</button>
    <button>Privacy Policy</button>
    <button>Terms & Conditions</button>
  </footer>

  <script>
    function changeColor(button) {
      button.classList.toggle('clicked');
    }
  </script>

</body>
</html>
