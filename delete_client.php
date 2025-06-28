<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM client WHERE ` Customer_ID` = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting client: " . $conn->error;
    }
} else {
    echo "No client ID provided.";
}
?>
