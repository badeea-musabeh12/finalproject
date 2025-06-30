<?php   require_once('connect.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        require_once('connect.php');
        $sql = "SELECT * FROM `reservations` WHERE `id` = $id";
        $res_reservations = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res_reservations) > 0) {
            $name = validate_input($_POST['name']);
            $reservations_ID = $_POST['reservations_ID'];
            $car_ID= $_POST['car_ID'];
            $customer_ID = $_POST['customer_ID'];
            $startdate = $_POST['startdate'];
            $endDate = $_POST['endDate'];
            $totalPrice = $_POST['totalPrice'];
            $counter_start = $_POST['counter_start'];
            $counter_end = $_POST['counter_end'];


            $sql = "UPDATE `reservations` SET `name` = '$name' WHERE `id` = $id";
            mysqli_query($conn, $sql);
        }
    }
}

header('Location: car.php');
exit();
?>
