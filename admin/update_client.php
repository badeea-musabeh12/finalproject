<?php   require_once('connect.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        require_once('connect.php');
        $sql = "SELECT * FROM `client` WHERE `id` = $id";
        $res_car = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res_client) > 0) {
            $name = validate_input($_POST['name']);
            $Customer_ID = $_POST['Customer_ID'];
            $Client_name= $_POST['Client_nmae'];
            $Phone = $_POST['Pone'];
            $ID_number = $_POST['ID_number'];
            $date_of_birth = $_POST['date_of_birth'];
            $license = $_POST['license'];

            $sql = "UPDATE `client` SET `name` = '$name' WHERE `id` = $id";
            mysqli_query($conn, $sql);
        }
    }
}

header('Location: car.php');
exit();
?>
