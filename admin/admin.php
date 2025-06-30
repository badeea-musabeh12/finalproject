 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
    }
.navbar {
            background-color: #38a6dd;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 14px 20px;
        }
        .navbar img {
            width: auto;
            height: 150px;
            margin-right: 5px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            text-align: center;
            margin: 0 50px;
            font-size: 30px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            transition: color 0.3s;
        }
        .navbar a:hover {
            background-color: #38a6dd;
            border-radius: 50px;
            color: #010415;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #38a6dd;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
     <?php
      include_once('menu.php');
      ?>
    <table>
        <tr>
            <th>#</th>
            <th>admin_ID</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
        </tr>
        <?php
        require_once('connect.php');
        $i = 1;
        $sql = "SELECT * FROM admin";
        $res_admin = mysqli_query($conn, $sql);
        while ($row_admin = mysqli_fetch_array($res_admin)) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row_admin['admin_ID'] . '</td>';
            echo '<td>' . $row_admin['name'] . '</td>';
            echo '<td>' . $row_admin['username'] . '</td>';
            echo '<td>' . $row_admin['password'] . '</td>';
            echo '</tr>';
            $i++;
        }
        ?>
    </table>
 
</body>
</html>