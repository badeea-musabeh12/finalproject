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

if ($_SESSION['role'] !== 'car') {
    echo "لا تملك صلاحية الوصول لهذه الصفحة.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('connect.php');
    $id = $_POST['id'];
    if(isset($_POST['yes'])){
        $sql = "DELETE FROM car WHERE car_id = $id";
        if(mysqli_query($conn, $sql))
        {
            echo 'succed';
        }
    }
  else{
    echo 'error';
  }
}
header ('Location: car.php');