<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM reservations WHERE reservations_ID = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: reservations_index.php");
        exit();
    } else {
        echo "Error deleting reservation: " . $conn->error;
    }
} else {
    echo "No reservation ID provided.";
}
?>
