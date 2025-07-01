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
    <title>Add_admin</title>
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
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $sql = "INSERT INTO `admin`
            (`name`, `username`, `password`, `role`) VALUES
            ('$name', '$username', '$password', '$role')";
        mysqli_query($conn, $sql);
        header('Location: admin.php');
    }
    ?>
    
    <div class = "btn">
    <a  harf="admin.php"></a>
</div>
<h1>Add new admin</h1>
<form action="add_admin.php" method="post" enctype="multipart/form-data">
`, `Sunnah`, `Daily_rental_price`, `condition`, `imagecar`) VALUES
            ('$car_model', '$car_brand', '$year', '$price', '$chair', '$img')";
        mysqli_query($conn, $sql);
        header('Location: car.php');
    }
    ?>
    
    <div class = "btn">
    <a  harf="car.php"></a>
</div>
<h1>Add new car</h1>
<form action="add_car.php" method="post" enctype="multipart/form-data">
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
    

?>

    
</body>
</html>


