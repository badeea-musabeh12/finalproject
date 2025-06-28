<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add car</title>
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
            <th>car_ID</th>
            <th>Model</th>
            <th>Brand</th>
            <th>Sunnah</th>
            <th>Daily_rental_price</th>
            <th>condition</th>
            <th>imagecar</th>
            
        </tr>
        <a href="add_car.php">Add New Car ➕</a>
         <a href="update_car.php"> update car</a>
         
        
    <?php
require_once('connect.php');
$i=1;
$sql = "SELECT * FROM `car`";
$res_car = mysqli_query($conn, $sql);
while($row_car = mysqli_fetch_array($res_car)){
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row_car['car_ID'].'</td>';
    echo '<td>'.$row_car['Model'].'</td>';
    echo '<td>'.$row_car['Brand'].'</td>';
    echo '<td>'.$row_car['Sunnah'].'</td>';
    echo '<td>'.$row_car['Daily_rental_price'].'</td>';
    echo '<td>'.$row_car['condition'].'</td>';
    echo '<td><img src = "../img/'.$row_car['imagecar'].'" width="80px"></td>';
    
    
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>