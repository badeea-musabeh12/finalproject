<?php   require_once('connect.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        require_once('include/connect.php');
        $sql = "SELECT * FROM `car` WHERE `id` = $id";
        $res_car = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res_car) > 0) {
            $name = validate_input($_POST['name']);
            $car_model = $_POST['car model'];
            $car_brand = $_POST['brand'];
            $munufacture_year = $_POST['year'];
            $Daily_Rental_Price = $_POST['price'];
            $condition = $_POST['condition'];

            $sql = "UPDATE `car` SET `name` = '$name' WHERE `id` = $id";
            mysqli_query($conn, $sql);
        }
    }
}

header('Location: car.php');
exit();
?>
