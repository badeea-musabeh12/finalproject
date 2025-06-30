<?php
session_start();

if (!isset($_SESSION['role'])) {
    // header("Location: admin.php");
    echo "لا تملك صلاحية الوصول لهذه الصفحة.";
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    echo "لا تملك صلاحية الوصول لهذه الصفحة.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit clinte</title>
    
</head>
<body>
<?php
require_once('connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM client WHERE a_id = $id";
$res_cat = mysqli_query($conn, $sql);
if($row_cat = mysqli_fetch_assoc($res_cat)) {
    $Cusromer_ID = $row_cat['Cusromer_ID'];
    $Client_name = $row_cat['Client_name'];
    $Phone = $row_cat['Phone'];
    $ID_number =$row_cat['ID_number'];
    $date_of_birth =$row_cat['date_of_birth'];
    $license =$row_cat['license'];
} else 
    echo "<p>المدير غير موجود.</p>";
?>
    <form action="client_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <table class="form">
    <caption>Edit car</caption>
                <tr>
                <td><label for="Cusromer_ID">Cusromer_ID</label></td>
                <td><input type="Cusromer_ID" name="Cusromer_ID" id="Cusromer_ID" value="<?php echo $Cusromer_ID;?>"></td>
            </tr>
            <tr>
                <td><label for="Client_name"></label></td>
                <td><input type="Client_name" name="Client_name" id="Client_name" value="<?php echo $Client_name;?>"></td>
            </tr>
            <tr>
                <td><label for="Phone">Phone</label></td>
                <td><input type="Phone" name="Phone" id="Phone" value="<?php echo $Phone;?>"></td>
            </tr>
             <tr>
                <td><label for="ID_number">"ID_number"</label></td>
                <td><input type="ID_number" name="ID_number" id="ID_number" value="<?php echo $ID_number;?>"></td>
            </tr>
             <tr>
                <td><label for="date_of_birth">date_of_birth</label></td>
                <td><input type="date_of_birth" name="date_of_birth" id="date_of_birth" value="<?php echo $date_of_birth;?>"></td>
            </tr>
             <tr>
                <td><label for="license">license</label></td>
                <td><input type="license" name="license" id="license" value="<?php echo $license;?>"></td>
            </tr>
            
                <td colspan="2"><input type="submit" name="submit" value="تعديل"></td>
            </tr>
        </table>
    </form>
</body>
</html>