<?php
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$car_id = $_GET['id'] ?? null;
$success = "";
$error = "";

if (!$car_id) {
  die("Car ID is missing.");
}

$stmt = $conn->prepare("SELECT * FROM car WHERE car_ID = ?");
$stmt->bind_param("i", $car_id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();
$stmt->close();

if (!$car) {
  die("Car not found.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $model = $_POST['model'];
  $brand = $_POST['brand'];
  $year = $_POST['year'];
  $price = $_POST['price'];
  $condition = $_POST['condition'];

  // Handle new image upload (optional)
  $image_name = $car['imagecar']; // keep old image by default
  if (isset($_FILES['imagecar']) && $_FILES['imagecar']['error'] == 0) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $file_name = $_FILES['imagecar']['name'];
    $file_tmp = $_FILES['imagecar']['tmp_name'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed)) {
      $image_name = uniqid() . '.' . $ext;
      $upload_dir = "uploads/";
      if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
      }
      move_uploaded_file($file_tmp, $upload_dir . $image_name);
    } else {
      $error = "Only JPG, JPEG, PNG, GIF files are allowed.";
    }
  }

  if (!$error) {
    $stmt = $conn->prepare("UPDATE car SET Model = ?, Brand = ?, Sunnah = ?, `Daily_rental _price` = ?, `condition` = ?, imagecar = ? WHERE car_ID = ?");
    $stmt->bind_param("ssssssi", $model, $brand, $year, $price, $condition, $image_name, $car_id);

    if ($stmt->execute()) {
      $success = "✅ Car updated successfully.";
    } else {
      $error = "❌ Failed to update car.";
    }
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Car</title>
  <style>
    /* Same styles as add_car */
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f9fc;
      padding: 40px;
    }
    h2 {
      color: #31ADE7;
    }
    form {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      max-width: 500px;
      margin: auto;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #31ADE7;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      margin-top: 20px;
      cursor: pointer;
      font-weight: bold;
    }
    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .success {
      color: green;
    }
    .error {
      color: red;
    }
    img.current-image {
      display: block;
      margin-top: 10px;
      max-width: 100%;
      max-height: 200px;
      border-radius: 8px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>

  <h2>Edit Car</h2>

  <form method="POST" enctype="multipart/form-data">
    <label for="model">Car Model</label>
    <input type="text" name="model" id="model" value="<?= htmlspecialchars($car['Model']) ?>" required>

    <label for="brand">Car Brand</label>
    <input type="text" name="brand" id="brand" value="<?= htmlspecialchars($car['Brand']) ?>" required>

    <label for="year">Manufacture Year</label>
    <input type="text" name="year" id="year" value="<?= htmlspecialchars($car['Sunnah']) ?>" required>

    <label for="price">Daily Rental Price</label>
    <input type="text" name="price" id="price" value="<?= htmlspecialchars($car['Daily_rental _price']) ?>" required>

    <label for="condition">Car Condition</label>
    <select name="condition" id="condition" required>
      <option value="New" <?= $car['condition'] === 'New' ? 'selected' : '' ?>>New</option>
      <option value="Used" <?= $car['condition'] === 'Used' ? 'selected' : '' ?>>Used</option>
      <option value="Excellent" <?= $car['condition'] === 'Excellent' ? 'selected' : '' ?>>Excellent</option>
    </select>

    <label for="imagecar">Car Image (optional)</label>
    <input type="file" name="imagecar" id="imagecar" accept="image/*">

    <?php if ($car['imagecar']): ?>
      <img src="uploads/<?= htmlspecialchars($car['imagecar']) ?>" alt="Current Car Image" class="current-image" />
    <?php endif; ?>

    <button type="submit">Update Car</button>

    <?php if ($success): ?>
      <div class="message success"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="message error"><?= $error ?></div>
    <?php endif; ?>
  </form>

</body>
</html>
