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
            $Client_name = $_POST['Client_name'];
            $Phone = $_POST['Phone'];
            $ID_number = $_POST['ID_number'];
            $date_of_birth = $_POST['Date_of_birth'];
            $license = $_POST['license'];

            $sql = "UPDATE `client` SET 
                `Client_name`= '$Client_name' , 
                `Phone`= ' $Phone',
                `ID_number`= ' $ID_number',
                `date_of_birth`= ' $date_of_birth',
                `license`= ' $license'
                 
                WHERE `Customer_ID` = $id";
            mysqli_query($conn, $sql);
        // }
    }
}

header('Location: client.php');
exit();
?>
