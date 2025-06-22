<?php
$conn = new mysqli("localhost", "root", "", "car_rental");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $model = $_POST['model'];
  $brand = $_POST['brand'];
  $year = $_POST['year'];
  $price = $_POST['price'];
  $condition = $_POST['condition'];

  // Handle image upload
  $image_name = null;
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
    $stmt = $conn->prepare("INSERT INTO car (Model, Brand, Sunnah, `Daily_rental _price`, `condition`, imagecar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $model, $brand, $year, $price, $condition, $image_name);

    if ($stmt->execute()) {
      $success = "✅ Car added successfully.";
    } else {
      $error = "❌ Failed to add car. " . $stmt->error;
    }
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add New Car</title>
  <style>
    /* Same styles as before plus file input */
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
  </style>
</head>
<body>

  <h2>Add New Car</h2>

  <form method="POST" enctype="multipart/form-data">
    <label for="model">Car Model</label>
    <input type="text" name="model" id="model" required>

    <label for="brand">Car Brand</label>
    <input type="text" name="brand" id="brand" required>

    <label for="year">Manufacture Year</label>
    <input type="text" name="year" id="year" required>

    <label for="price">Daily Rental Price</label>
    <input type="text" name="price" id="price" required>

    <label for="condition">Car Condition</label>
    <select name="condition" id="condition" required>
      <option value="New">New</option>
      <option value="Used">Used</option>
      <option value="Excellent">Excellent</option>
    </select>

    <label for="imagecar">Car Image</label>
    <input type="file" name="imagecar" id="imagecar" accept="image/*">

    <button type="submit">➕ Add Car</button>

    <?php if ($success): ?>
      <div class="message success"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="message error"><?= $error ?></div>
    <?php endif; ?>
  </form>

</body>
</html>
