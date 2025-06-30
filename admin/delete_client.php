<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>delet client</title>
  
</head>
<body>
<?php

  require_once('connect.php');

  if (isset($_GET['id'])) 
    $id = $_GET['id'];
    if (is_numeric($id)) {
      $sql = "SELECT * FROM client WHERE id = $id";
      $res_client = mysqli_query($conn, $sql);
    }
      if(isset($_POST['submit'])){
        $Customer_ID = $_POST['Customer_ID'];
        $Client_name = $_POST['Client_name'];
        $Phone = $_POST['Phone'];
        $ID_number = $_POST['ID_number'];
        $date_of_birth = $_POST['date_of_birth'];
        $license = $_POST['license'];
        
        $sql = "INSERT INTO `client`
            (`Customer_ID`, `Client_name`, `Phone`, `ID_number`, `date_of_birth`, `license`) VALUES
            ('$Customer_ID', '$Client_name', '$Phone', '$ID_number', '$date_of_birth', '$license')";
        mysqli_query($conn, $sql);
        header('Location: client.php');
    }
?>
       <form action="delete_client.php" method="post" enctype="multipart/form-data">
<table class="form"> 
    <tr>
        <td><label for="Customer_ID">Customer_ID</label></td>
        <td><input type="text" name="Customer_ID" id="Customer_ID"></td>
    </tr>
    <tr>
     <td><label for="Client_name">Client_name</label></td>
        <td><input type="text" name="Client_name" id="Client_name"></td>
    </tr>
    <tr>
        <td><label for="Phone">Phone</label></td>
        <td><input type="text" name="Phone" id="Phone"></td>
    </tr>
    <tr>
        <td><label for="ID_number">ID_number</label></td>
        <td><input type="text" name="ID_number" id="ID_number"></td>
    </tr>
    <tr>
         <td><label for="date_of_birth">date_of_birth</label></td>
         <td><input type="text" name="date_of_birth" id="date_of_birth"></td>
    </tr>
    <tr>
         <td><label for="license">license</label></td>
         <td><input type="text" name="license" id="license"></td>
    </tr>
    <tr>

   
        
        <td colspan="2"><input type="submit" name="submit" value="Add new client➕"></td>

    </tr>
</table>
        </form>
<?php
require_once('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM client WHERE id = $id";
    $res_client = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res_client) > 0) {
    } else {
        header("Location: client.php");
        exit();
    }
} else {
    header("Location: client.php");
    exit();
}
?>

</body>
</html>