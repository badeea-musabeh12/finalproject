<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Reservation ID is missing.";
    exit;
}

// جلب بيانات الحجز الحالي
$sql = "SELECT * FROM reservations WHERE reservations_ID = $id";
$result = $conn->query($sql);
$reservation = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_ID = $_POST['car_ID'];
    $customer_ID = $_POST['customer_ID'];
    $start = $_POST['staetData'];
    $end = $_POST['endData'];
    $totalPrice = $_POST['totalPrice'];
    $counter_start = $_POST['counter_start'];
    $counter_end = $_POST['counter_end'];

    $update_sql = "UPDATE reservations SET 
        car_ID = '$car_ID',
        customer_ID = '$customer_ID',
        staetData = '$start',
        endData = '$end',
        totalPrice = '$totalPrice',
        counter_start = '$counter_start',
        counter_end = '$counter_end'
        WHERE reservations_ID = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: reservations_index.php");
        exit();
    } else {
        echo "Error updating reservation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Reservation</title>
    <style>
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; }
        button { margin-top: 15px; padding: 10px 15px; background: #38a6dd; color: white; border: none; border-radius: 5px; }
        form { max-width: 400px; margin: auto; }
    </style>
</head>
<body>

<h2 style="text-align: center;">Update Reservation</h2>

<form method="POST">
    <label>Car ID:</label>
    <input type="number" name="car_ID" value="<?= $reservation['car_ID'] ?>" required>

    <label>Customer ID:</label>
    <input type="number" name="customer_ID" value="<?= $reservation['customer_ID'] ?>" required>

    <label>Start Date:</label>
    <input type="date" name="staetData" value="<?= $reservation['staetData'] ?>" required>

    <label>End Date:</label>
    <input type="date" name="endData" value="<?= $reservation['endData'] ?>" required>

    <label>Total Price:</label>
    <input type="number" name="totalPrice" value="<?= $reservation['totalPrice'] ?>" required>

    <label>Counter Start:</label>
    <input type="number" name="counter_start" value="<?= $reservation['counter_start'] ?>" required>

    <label>Counter End:</label>
    <input type="number" name="counter_end" value="<?= $reservation['counter_end'] ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>
