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
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>delet reservations</title>
  
</head>
<body>
<?php

  require_once('connect.php');

  if (isset($_GET['id'])) 
    $id = $_GET['id'];
    if (is_numeric($id)) {
      $sql = "SELECT * FROM reservations WHERE id = $id";
      $res_reservations = mysqli_query($conn, $sql);
    }
      if(isset($_POST['submit'])){
        $reservations_ID = $_POST['reservations_ID'];
        $car_ID = $_POST['car_ID'];
        $customer_ID = $_POST['customer_ID'];
        $startdate = $_POST['startdate'];
        $endDate = $_POST['endDate'];
        $totalPrice = $_POST['totalPrice'];
        $counter_start = $_POST['counter_start'];
        $counter_end = $_POST['counter_end'];
        
        $sql = "INSERT INTO `reservations`
            (`reservations_ID`, `car_ID`, `customer_ID`, `startdate`, `endDate`, `totalPrice`,`counter_start`,`counter_end`) VALUES
            ('$reservations_ID', '$car_ID', '$customer_ID', '$startdate', '$endDate', '$totalPrice','countar_start','counter_end')";
        mysqli_query($conn, $sql);
        header('Location: reservations.php');
    }
?>
       <form action="delete_reservations.php" method="post" enctype="multipart/form-data">
<table class="form"> 
    <tr>
        <td><label for="reservations_ID">reservations_ID</label></td>
        <td><input type="text" name="reservations_ID" id="reservations_ID"></td>
    </tr>
    <tr>
     <td><label for="car_ID">car_ID</label></td>
        <td><input type="text" name="car_ID" id="car_ID"></td>
    </tr>
    <tr>
        <td><label for="customer_ID">customer_ID</label></td>
        <td><input type="text" name="customer_ID" id="customer_ID"></td>
    </tr>
    <tr>
        <td><label for="startdate">startdate</label></td>
        <td><input type="text" name="startdate" id="startdate"></td>
    </tr>
    <tr>
         <td><label for="endDate">endDate</label></td>
         <td><input type="text" name="endDate" id="endDate"></td>
    </tr>
    <tr>
         <td><label for="totalPrice">totalPrice</label></td>
         <td><input type="text" name="totalPrice" id="totalPrice"></td>
    </tr>
    <tr>
         <td><label for="counter_start">counter_start</label></td>
         <td><input type="text" name="counter_start" id="counter_start"></td>
    </tr>
    <tr>
         <td><label for="counter_end">counter_end</label></td>
         <td><input type="text" name="counter_end" id="counter_end"></td>
    </tr>
    <tr>

   
        
        <td colspan="2"><input type="submit" name="submit" value="Add new reservations➕"></td>

    </tr>
</table>
        </form>
<?php
require_once('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM reservations WHERE id = $id";
    $res_reservations= mysqli_query($conn, $sql);
    if (mysqli_num_rows($res_reservations) > 0) {
    } else {
        header("Location: reservations.php");
        exit();
    }
} else {
    header("Location: reservations.php");
    exit();
}
?>

</body>
</html>