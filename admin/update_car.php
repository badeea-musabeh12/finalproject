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
<?php   require_once('connect.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        require_once('connect.php');
        // $sql = "SELECT * FROM `car` WHERE `id` = $id";
        // $res_car = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($res_car) > 0) {
            // $name = $_POST['name'];
            $car_model = $_POST['Model'];
            $car_brand = $_POST['Brand'];
            $Sunnah = $_POST['Sunnah'];
            $Daily_Rental_Price = $_POST['Daily_rental_price'];
            $condition = $_POST['condition'];

            $sql = "UPDATE `car` SET 
                `model`= '$car_model' , 
                `brand`= ' $car_brand',
                `Sunnah`= ' $Sunnah',
                `Daily_Rental_Price`= '$Daily_Rental_Price',
                `condition`= ' $condition' 
                WHERE `car_ID` = $id";
            mysqli_query($conn, $sql);
        // }
    }
}

header('Location: car.php');
exit();
?>
