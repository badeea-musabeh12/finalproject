<?php
$conn = new mysqli("localhost", "root", "", "car_rental");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM car");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Cars</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f9f9f9;
      padding: 40px;
    }

    h1 {
      color: #31ADE7;
      margin-bottom: 20px;
    }

    .add-btn {
      background-color: #31ADE7;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      margin-bottom: 20px;
      display: inline-block;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #31ADE7;
      color: white;
    }

    .action-btn {
      padding: 6px 12px;
      border-radius: 6px;
      border: none;
      color: white;
      cursor: pointer;
      text-decoration: none;
    }

    .edit-btn { background-color: #ffa500; }
    .delete-btn { background-color: #e74c3c; }
  </style>
</head>
<body>

  <h1>🚗 Car List</h1>

  <a href="add_car.php" class="add-btn">➕ Add New Car</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Brand</th>
      <th>Year</th>
      <th>Daily Price</th>
      <th>Condition</th>
      <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['car_ID'] ?></td>
      <td><?= $row['Model'] ?></td>
      <td><?= $row['Brand'] ?></td>
      <td><?= $row['Sunnah'] ?></td>
      <td><?= $row['Daily_rental _price'] ?></td>
      <td><?= $row['condition'] ?></td>
      <td>
  <?php if ($row['imagecar']): ?>
    <img src="uploads/<?= htmlspecialchars($row['imagecar']) ?>" alt="Car Image" style="max-width: 100px; border-radius: 8px;">
  <?php else: ?>
    No image
  <?php endif; ?>
</td>
      <td>
        <a href="edit_car.php?id=<?= $row['car_ID'] ?>" class="action-btn edit-btn">Edit</a>
        <a href="delete_car.php?id=<?= $row['car_ID'] ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this car?');">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>

</body>
</html>
