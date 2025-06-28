<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Client_name'];
    $phone = $_POST['Phone'];
    $id_number = $_POST['ID_number'];
    $dob = $_POST['date_of_birth'];
    $license = $_POST['license'];

    $sql = "INSERT INTO client (`Client_name`, `Phone`, `ID_number`, `date_of_birth`, `license`) 
            VALUES ('$name', '$phone', '$id_number', '$dob', '$license')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error while adding: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
    <style>
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 15px; background-color: #38a6dd; color: white; border: none; border-radius: 5px; }
        form { max-width: 400px; margin: auto; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Add New Client</h2>
<form method="POST">
    <label>Full Name:</label>
    <input type="text" name="Client_name" required>

    <label>Phone Number:</label>
    <input type="text" name="Phone" required>

    <label>ID Number:</label>
    <input type="text" name="ID_number" required>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" required>

    <label>License Number:</label>
    <input type="text" name="license" required>

    <button type="submit">Add</button>
</form>

</body>
</html>
