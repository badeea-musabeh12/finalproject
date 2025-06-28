<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Client ID is missing.";
    exit;
}

$sql = "SELECT * FROM client WHERE ` Customer_ID` = $id";
$result = $conn->query($sql);
$client = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Client_name'];
    $phone = $_POST['Phone'];
    $id_number = $_POST['ID_number'];
    $dob = $_POST['date_of_birth'];
    $license = $_POST['license'];

    $update_sql = "UPDATE client SET 
                    `Client_name`='$name',
                    `Phone`='$phone',
                    `ID_number`='$id_number',
                    `date_of_birth`='$dob',
                    `license`='$license'
                   WHERE ` Customer_ID` = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
    <style>
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 15px; background-color: #38a6dd; color: white; border: none; border-radius: 5px; }
        form { max-width: 400px; margin: auto; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Update Client Information</h2>
<form method="POST">
    <label>Full Name:</label>
    <input type="text" name="Client_name" value="<?= $client['Client_name'] ?>" required>

    <label>Phone Number:</label>
    <input type="text" name="Phone" value="<?= $client['Phone'] ?>" required>

    <label>ID Number:</label>
    <input type="text" name="ID_number" value="<?= $client['ID_number'] ?>" required>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="<?= $client['date_of_birth'] ?>" required>

    <label>License Number:</label>
    <input type="text" name="license" value="<?= $client['license'] ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>
