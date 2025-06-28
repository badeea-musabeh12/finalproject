<?php
include 'db.php';

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        a.button {
            padding: 6px 12px;
            background-color: #38a6dd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }
    </style>
</head>

<body>
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customer infomation</title>
    <link rel="stylesheet" href="stylescustomer information.css" />

</head>
<body>

    <header>
   
      <div class="navbar">
 
      <img  src="img/icons.png" alt="logo" class="logo">
         <a href="home.html"> Home</a>
        <a href="Cars..html">Cars</a>
        <a href="location..html">Location</a>
        <a href="contact us.html">  Contact us</a>
        <a href="#">Log in  </a>

     </div>
         
  </header>


<div class="header">
    <h2>Reservations List</h2>
    <a href="add_reservation.php" class="button">Add New Reservation</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Car ID</th>
        <th>Customer ID</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Total Price</th>
        <th>Counter Start</th>
        <th>Counter End</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['reservations_ID'] ?></td>
        <td><?= $row['car_ID'] ?></td>
        <td><?= $row['customer_ID'] ?></td>
        <td><?= $row['staetData'] ?></td>
        <td><?= $row['endData'] ?></td>
        <td><?= $row['totalPrice'] ?></td>
        <td><?= $row['counter_start'] ?></td>
        <td><?= $row['counter_end'] ?></td>
        <td>
            <a href="update_reservation.php?id=<?= $row['reservations_ID'] ?>" class="button">Update</a>
            <a href="delete_reservation.php?id=<?= $row['reservations_ID'] ?>" class="button" style="background:red;">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
