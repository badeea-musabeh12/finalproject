<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add client</title>
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
            <th>Client_name</th>
            <th>Customer_ID</th>
            <th>Phone</th>
            <th>ID_number</th>
            <th>date_of_birth</th>
            <th>license</th>
</tr>
<a href="add_client.php">Add New Client ➕</a>
    <?php
require_once('connect.php');
$i=1;
$sql = "SELECT * FROM `client`";
$res_client = mysqli_query($conn, $sql);
while($row_client = mysqli_fetch_array($res_client)){
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row_client['Client_name'].'</td>';
    echo '<td>'.$row_client['Customer_ID'].'</td>';
    echo '<td>'.$row_client['Phone'].'</td>';
    echo '<td>'.$row_client['ID_number'].'</td>';
    echo '<td>'.$row_client['date_of_birth'].'</td>';
    echo '<td>'.$row_client['license'].'</td>';
echo '<td>';
    echo '<div class="btn"><a href="delete_client.php">Delete</a>';
    echo '</td>';
    echo '<td>';
    echo '<div class="btn"><a href="update_client.php">Update</a>';
    echo '</td>';
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>