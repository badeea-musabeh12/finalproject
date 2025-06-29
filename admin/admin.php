<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    <table border="1">
        <tr>
            <th>#</th>
            <th>admin_ID</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
        </tr>
    <?php
require_once('connect.php');
$i=1;
$sql = "SELECT * FROM `admin`";
$res_admin = mysqli_query($conn, $sql);
while($row_admin = mysqli_fetch_array($res_admin)){
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row_admin['admin_ID'].'</td>';
    echo '<td>'.$row_admin['name'].'</td>';
    echo '<td>'.$row_admin['email'].'</td>';
    echo '<td>'.$row_admin['password'].'</td>';
    
    echo '</tr>';
    $i++;
}
    ?>
    </table>
</body>
</html>