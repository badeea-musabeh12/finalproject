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
       
            $car_ID = $_POST['car_ID'];
            $customer_ID = $_POST['customer_ID'];
            $startdate = $_POST['startdate'];
            $endDate = $_POST['endDate'];
            $totalPrice = $_POST['totalPrice'];
            $counter_start = $_POST['counter_start'];
            $counter_end = $_POST['counter_end'];

            $sql = "UPDATE `reservations` SET 
                `car_ID`= '$car_ID' , 
                `customer_ID`= ' $customer_ID',
                `startdate`= ' $startdate',
                `endDate`= ' $endDate',
                `totalPrice`= ' $totalPrice',
                `counter_start`= ' $counter_start',
                `counter_end`= ' $counter_end'
                 
                WHERE `reservations_ID` = $id";
            mysqli_query($conn, $sql);
        
    }
}

header('Location: reservations.php');
exit();
?>
