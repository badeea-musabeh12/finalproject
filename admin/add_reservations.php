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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_reservations</title>
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
</style>
</head>
<body>
    <?php
    require_once('connect.php');
    if(isset($_POST['submit'])){
        $reservitons_ID = $_POST['reservaitons_ID'];
        $car_ID= $_POST['car_ID'];
        $customer_ID = $_POST['customer_ID'];
        $startdate = $_POST['startdate'];
        $endDate = $_POST['endDate'];
        $totalPrice=$_POST['totalPrice'];
        $counter_start=$_POST['counter_start'];
        $counter_end=$_POST['counter_end']
        
        $sql = "INSERT INTO `reservations`
            (`reservaitons_ID`, `car_ID`,`customer_ID`, `startdate`, `enddate`, `totalPrice`, `counter_start` ,`counter_end`) VALUES
            ('$reservaitons_ID', '$car_ID', '$customer_ID','$startdate', '$endDate', '$totalPrice', '$counter_start','$counter_end')";
        mysqli_query($conn, $sql);
        header('Location: reservitons.php');
    }
    ?>
    
    <div class = "btn">
    <a  harf="resarvations.php"></a>
</div>
<h1>Add new reservations</h1>
<form action="add_client.php" method="post" enctype="multipart/form-data">
<table class="form"> 
    <tr>
        <td><label for="reservaitons_ID">reservaitons_ID</label></td>
        <td><input type="text" name="reservaitons_ID" id="reservaitons_ID"></td>
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

    </tr>
        <td><label for="totalPrice">totalPrice</label></td>
        <td> <input type="text" name="totalPrice" id="totalPrice"></td>
    <tr>
        </tr>
        <td><label for="counter_start">counter_start</label></td>
        <td> <input type="text" name="counter_start" id="counter_start"></td>
    <tr>
        </tr>
        <td><label for="counter_end">counter_end</label></td>
        <td> <input type="text" name="counter_end" id="counter_end"></td>
    <tr>
        
        <td colspan="2"><input type="submit" name="submit" value="Add new  client➕"></td>

    </tr>
</table>
        </form>
    <?php
    

?>

    
</body>
</html>


