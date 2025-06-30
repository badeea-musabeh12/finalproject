<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
    }
    .navbar {
            background-color: #38a6dd;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 14px 20px;
        }
        .navbar img {
            width: auto;
            height: 150px;
            margin-right: 5px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            text-align: center;
            margin: 0 50px;
            font-size: 30px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            transition: color 0.3s;
        }
        .navbar a:hover {
            background-color: #38a6dd;
            border-radius: 50px;
            color: #010415;
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
        <?php
      include_once('menu.php');
      ?>
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
    echo '<td>';
    echo '<div class="btn"><a href="delete_car.php">Delete</a>';
    echo '</td>';
    echo '<td>';
    echo '<div class="btn"><a href="update_car.php">Update</a>';
    echo '</td>';
    
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>