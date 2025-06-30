<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add reservations</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th {
        background-color: #38a6dd;
        color: white;
        padding: 12px;
        text-align: center;
        font-weight: bold;
    }

    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .actions {
        margin-bottom: 15px;
    }

    .actions a {
        text-decoration: none;
        background-color: #38a6dd;
        color: white;
        padding: 8px 14px;
        border-radius: 5px;
        margin-right: 10px;
        font-weight: bold;
    }

    .actions a:hover {
        background-color: #2d8abf;
    }

</style>
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
        <a href="add_reservtions.php">Add New reservations ➕</a>
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
     echo '<td>';
    echo '<div class="btn"><a href="delete_reservations.php">Delete</a>';
    echo '</td>';
    echo '<td>';
    echo '<div class="btn"><a href="update_reservations.php">Update</a>';
    echo '</td>';
    
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>