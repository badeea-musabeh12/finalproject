<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>حذف السيارة</title>
  
</head>
<body>
<?php

  require_once('connect.php');

  if (isset($_GET['id'])) 
    $id = $_GET['id'];
    if (is_numeric($id)) {
      $sql = "SELECT * FROM car WHERE id = $id";
      $res_car = mysqli_query($conn, $sql);
    }
      if(isset($_POST['submit'])){
        $car_model = $_POST['car_model'];
        $car_brand = $_POST['car_brand'];
        $year = $_POST['year'];
        $price = $_POST['price'];
        $chair = $_POST['chair'];
        $img = '';
        if($_FILES['img']['error'] == 0){
            $img = $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], '../img/'.$img);
        }
        $sql = "INSERT INTO `car`
            (`Model`, `Brand`, `Sunnah`, `Daily_rental_price`, `condition`, `imagecar`) VALUES
            ('$car_model', '$car_brand', '$year', '$price', '$chair', '$img')";
        mysqli_query($conn, $sql);
        header('Location: car.php');
    }
?>
       <form action="delete_car.php" method="post" enctype="multipart/form-data">
<table class="form"> 
    <tr>
        <td><label for="car_model">Car Model</label></td>
        <td><input type="text" name="car_model" id="car_model"></td>
    </tr>
    <tr>
     <td><label for="car_brand">Car Brand</label></td>
        <td><input type="text" name="car_brand" id="car_brand"></td>
    </tr>
    <tr>
        <td><label for="year">Manufacture Year</label></td>
        <td><input type="text" name="year" id="year"></td>
    </tr>
    <tr>
        <td><label for="price">Daily Rental Price</label></td>
        <td><input type="text" name="price" id="price"></td>
    </tr>
    <tr>
         <td><label for="chair">Number of chairs</label></td>
         <td><input type="text" name="chair" id="chair"></td>
    </tr>
    <tr>

    </tr>
        <td><label for="img">Car img</label></td>
        <td> <input type="file" name="img" id="img" accept="image/*"></td>
    <tr>
        
        <td colspan="2"><input type="submit" name="submit" value="Add new car➕"></td>

    </tr>
</table>
        </form>
<?php
require_once('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM car WHERE id = $id";
    $res_car = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res_car) > 0) {
    } else {
        header("Location: car.php");
        exit();
    }
} else {
    header("Location: car.php");
    exit();
}
?>

</body>
</html>