<?php
require_once('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM car WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <style>
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

<h2>Edit Car Info</h2>
<form action="update_car.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">

    <label>Car Model</label>
    <input type="text" name="car_model" value="<?php echo $car['Model']; ?>"><br><br>

    <label>Car Brand</label>
    <input type="text" name="car_brand" value="<?php echo $car['Brand']; ?>"><br><br>

    <label>Manufacture Year</label>
    <input type="text" name="year" value="<?php echo $car['Sunnah']; ?>"><br><br>

    <label>Daily Rental Price</label>
    <input type="text" name="price" value="<?php echo $car['Daily_rental_price']; ?>"><br><br>

    <label>Number of Chairs</label>
    <input type="text" name="chair" value="<?php echo $car['condition']; ?>"><br><br>

    <label>Change Image (optional)</label>
    <input type="file" name="img"><br><br>

    <input type="submit" name="submit" value="Update">
</form>
<?php endif; 
  require_once('connect.php');
?>
   
    <button type="submit">Update Car</button>

    <?php if ($success): ?>
      <div class="message success"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="message error"><?= $error ?></div>
    <?php endif; ?>

</body>
</html>

<?php
    } else {
        echo "Car not found.";
    }
} else {
    echo "No ID found.";
}
?>