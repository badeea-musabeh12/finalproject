<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Model, Brand, `Daily_rental _price`, Sunnah, imagecar FROM car";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="stylesCars.css">
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 30px;
    }

    .box {
      background-color: white;
      width: 18%;
      min-width: 230px;
      border-radius: 8px;
      padding: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .box img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 6px;
    }

    .box h3 {
      color: #31ADE7;
      margin: 10px 0;
    }

    .box p {
      margin: 5px 0;
    }

    .button {
      margin-top: 10px;
      padding: 8px 16px;
      background-color: #31ADE7;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      display: inline-block;
    }

    .button:hover {
      background-color: #1f7ec8;
    }
  </style>
</head>
<body>
<header>
  <div class="navbar">
    <img src="img/icons.png" alt="logo" class="logo">
    <a href="#"> Home</a>
    <a href="cars.php">Cars</a>
    <a href="location..html">Location</a>
    <a href="contact us.html">Contact us</a>
    <a href="#">Log in</a>
  </div>
</header>

<main>
  <div class="container">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($car = $result->fetch_assoc()): ?>
        <div class="box">
          <?php if (!empty($car['imagecar']) && file_exists("uploads/" . $car['imagecar'])): ?>
            <img src="uploads/<?= htmlspecialchars($car['imagecar']) ?>" alt="Car">
          <?php else: ?>
            <img src="img/default_car.jpg" alt="Default car">
          <?php endif; ?>
          <h3><?= htmlspecialchars($car['Brand']) ?> <?= htmlspecialchars($car['Model']) ?> <?= htmlspecialchars($car['Sunnah']) ?></h3>
          <p>₪<?= htmlspecialchars($car['Daily_rental _price']) ?> per day</p>
          <p>7 Chairs</p> <!-- You can make this dynamic if you add chair count in DB -->
          <a href="customer_information.html" class="button">Reserve</a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No cars available at the moment.</p>
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

<?php $conn->close(); ?>
