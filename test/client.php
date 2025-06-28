<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add client</title>
</head>
<body>
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

    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>