
<?php
include 'db.php';

$sql = "SELECT * FROM client";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        a.button { padding: 8px 12px; background: #38a6dd; color: white; text-decoration: none; border-radius: 5px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="header">
    <h2>Client List</h2>
    <a href="add_client.php" class="button">Add New Client</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>ID Number</th>
        <th>Date of Birth</th>
        <th>License</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row[' Customer_ID'] ?></td>
        <td><?= $row['Client_name'] ?></td>
        <td><?= $row['Phone'] ?></td>
        <td><?= $row['ID_number'] ?></td>
        <td><?= $row['date_of_birth'] ?></td>
        <td><?= $row['license'] ?></td>
        <td>
            <a href="update_client.php?id=<?= $row[' Customer_ID'] ?>" class="button">Update</a>
            <a href="delete_client.php?id=<?= $row[' Customer_ID'] ?>" class="button" style="background: red;">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
