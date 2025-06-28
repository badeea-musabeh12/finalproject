<?php
include("include/connect.php");

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
