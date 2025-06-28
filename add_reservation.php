<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_ID = $_POST['car_ID'];
    $customer_ID = $_POST['customer_ID'];
    $start = $_POST['staetData'];
    $end = $_POST['endData'];
    $totalPrice = $_POST['totalPrice'];
    $counter_start = $_POST['counter_start'];
    $counter_end = $_POST['counter_end'];

    $sql = "INSERT INTO reservations (car_ID, customer_ID, staetData, endData, totalPrice, counter_start, counter_end)
            VALUES ('$car_ID', '$customer_ID', '$start', '$end', '$totalPrice', '$counter_start', '$counter_end')";

    if ($conn->query($sql) === TRUE) {
        header("Location: reservations_index.php");
        exit();
    } else {
        echo "Error adding reservation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Reservation</title>
    <style>
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; }
        button { margin-top: 15px; padding: 10px 15px; background: #38a6dd; color: white; border: none; border-radius: 5px; }
        form { max-width: 400px; margin: auto; }
    </style>
</head>
<body>

<h2 style="text-align: center;">Add New Reservation</h2>

<form method="POST">
    <label>Car ID:</label>
    <input type="number" name="car_ID" required>

    <label>Customer ID:</label>
    <input type="number" name="customer_ID" required>

    <label>Start Date:</label>
    <input type="date" name="staetData" required>

    <label>End Date:</label>
    <input type="date" name="endData" required>

    <label>Total Price:</label>
    <input type="number" name="totalPrice" required>

    <label>Counter Start:</label>
    <input type="number" name="counter_start" required>

    <label>Counter End:</label>
    <input type="number" name="counter_end" required>

    <button type="submit">Add</button>
</form>

</body>
</html>
