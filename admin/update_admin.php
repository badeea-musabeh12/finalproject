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
        
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            

            $sql = "UPDATE `admin` SET 
                `name`= '$name' , 
                `username`= ' $username',
                `password`= ' $password',
               
                 
                WHERE `admin_ID` = $id";
            mysqli_query($conn, $sql);
        // }
    }
}

header('Location: admin.php');
exit();
?>
