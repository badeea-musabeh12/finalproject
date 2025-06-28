<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add reservations</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>#</th>
            <th>reservations_ID</th>
            <th>car_ID</th>
            <th>customer_ID</th>
            <th>startdate</th>
            <th>endDate</th>
            <th>totalprice</th>
            <th>counter_start</th>
            <th>counter_end</th>


        </tr>
    <?php
require_once('connect.php');
$i=1;
$sql = "SELECT * FROM `reservations`";
$res_reservations = mysqli_query($conn, $sql);
while($row_reservations = mysqli_fetch_array($res_reservations)){
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row_reservations['reservations_ID'].'</td>';
    echo '<td>'.$row_reservations['car_ID'].'</td>';
    echo '<td>'.$row_reservations['customer_ID'].'</td>';
    echo '<td>'.$row_reservations['startdate'].'</td>';
    echo '<td>'.$row_reservations['endDate'].'</td>';
    echo '<td>'.$row_reservations['totalPrice'].'</td>';
    echo '<td>'.$row_reservations['counter_start'].'</td>';
     echo '<td>'.$row_reservations['counter_end'].'</td>';
    
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>