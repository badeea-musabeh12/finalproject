<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars
$sql = "SELECT Model, Brand, `Daily_rental _price`, Sunnah, imagecar FROM car";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cars</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="stylesCars.css" />
  <style>
    /* Add some basic style for dynamic car boxes */
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      padding: 20px;
    }
    .box {
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 280px;
      padding: 15px;
      text-align: center;
      font-family: 'Roboto', sans-serif;
    }
    .box img {
      max-width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
    }
    .box h3 {
      margin: 10px 0 8px;
      color: #31ADE7;
    }
    .box p {
      margin: 4px 0;
      font-weight: 500;
      color: #333;
    }
    .button {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 18px;
      background-color: #31ADE7;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #1f7ec8;
    }
  </style>
</head>
<body>

<header>
  <div class="navbar">
    <img src="img/icons.png" alt="logo" class="logo" />
    <a href="#">Home</a>
    <a href="cars.php">Cars</a>
    <a href="location..html">Location</a>
    <a href="contact us.html">Contact Us</a>
    <a href="#">Log in</a>
  </div>
</header>

<main>
  <div class="container">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($car = $result->fetch_assoc()): ?>
        <div class="box">
          <?php if ($car['imagecar'] && file_exists("uploads/" . $car['imagecar'])): ?>
            <img src="uploads/<?= htmlspecialchars($car['imagecar']) ?>" alt="<?= htmlspecialchars($car['Model']) ?>" />
          <?php else: ?>
            <img src="img/default_car.jpg" alt="No image available" />
          <?php endif; ?>

          <h3><?= htmlspecialchars($car['Brand']) ?> <?= htmlspecialchars($car['Model']) ?> <?= htmlspecialchars($car['Sunnah']) ?></h3>
          <p>Price per day: <?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars
$sql = "SELECT Model, Brand, `Daily_rental _price`, Sunnah, imagecar FROM car";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cars</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="stylesCars.css" />
  <style>
    /* Add some basic style for dynamic car boxes */
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      padding: 20px;
    }
    .box {
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 280px;
      padding: 15px;
      text-align: center;
      font-family: 'Roboto', sans-serif;
    }
    .box img {
      max-width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
    }
    .box h3 {
      margin: 10px 0 8px;
      color: #31ADE7;
    }
    .box p {
      margin: 4px 0;
      font-weight: 500;
      color: #333;
    }
    .button {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 18px;
      background-color: #31ADE7;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #1f7ec8;
    }
  </style>
</head>
<body>

<header>
  <div class="navbar">
    <img src="img/icons.png" alt="logo" class="logo" />
    <a href="#">Home</a>
    <a href="cars.php">Cars</a>
    <a href="location..html">Location</a>
    <a href="contact us.html">Contact Us</a>
    <a href="#">Log in</a>
  </div>
</header>

<main>
  <div class="container">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($car = $result->fetch_assoc()): ?>
        <div class="box">
          <?php if ($car['imagecar'] && file_exists("uploads/" . $car['imagecar'])): ?>
            <img src="uploads/<?= htmlspecialchars($car['imagecar']) ?>" alt="<?= htmlspecialchars($car['Model']) ?>" />
          <?php else: ?>
            <img src="img/default_car.jpg" alt="No image available" />
          <?php endif; ?>

          <h3><?= htmlspecialchars($car['Brand']) ?> <?= htmlspecialchars($car['Model']) ?> <?= htmlspecialchars($car['Sunnah']) ?></h3>
          <p>Price per day: ₪<?= htmlspecialchars($car['Daily_rental _price']) ?></p>
          <!-- You can add number of chairs if stored, for example: -->
          <p>7 Chairs</p> <!-- Change this to dynamic if you store chairs count -->
          <a href="customer_information.html" class="button">Reserve</a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No cars available right now.</p>
    <?php endif; ?>
  </div>
</main>

<footer>
  <div class="footer">
    <button>Model</button>
    <button>Brand</button>
    <button>Minimum Price</button>
    <button>Maximum Price</button>
    <button>Research</button>
    <button>See All</button>
  </div>
</footer>

</body>
</html>

<?php
$conn->close();
?>
<?= htmlspecialchars($car['Daily_rental _price']) ?></p>
          <!-- You can add number of chairs if stored, for example: -->
          <p>7 Chairs</p> <!-- Change this to dynamic if you store chairs count -->
          <a href="customer_information.html" class="button">Reserve</a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No cars available right now.</p>
    <?php endif; ?>
  </div>
</main>

<footer>
  <div class="footer">
    <button>Model</button>
    <button>Brand</button>
    <button>Minimum Price</button>
    <button>Maximum Price</button>
    <button>Research</button>
    <button>See All</button>
  </div>
</footer>

</body>
</html>

<?php
$conn->close();
?>
