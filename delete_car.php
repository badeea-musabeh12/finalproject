<?php
$conn = new mysqli("localhost", "root", "", "car_rental");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$car_id = $_GET['id'] ?? null;

if (!$car_id) {
    die("Car ID is missing.");
}

// Prepare and execute delete statement
$stmt = $conn->prepare("DELETE FROM car WHERE car_ID = ?");
$stmt->bind_param("i", $car_id);

if ($stmt->execute()) {
    // Redirect back to car list after successful deletion
    header("Location: car_index.php?message=deleted");
    exit();
} else {
    echo "Error deleting car: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
