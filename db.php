<?php
$host = "localhost";      
$user = "root";           
$password = "";            
$dbname = "car_rental";   

$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>