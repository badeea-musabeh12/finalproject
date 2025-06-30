<?php
session_start();

if (!isset($_SESSION['role']))  {
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
    <title>Edit car</title>
    
</head>
<body>
<?php
require_once('connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM car WHERE car_id = $id";
$res_cat = mysqli_query($conn, $sql);
if($row_cat = mysqli_fetch_assoc($res_cat)) {
    $car_ID = $row_cat['car_ID'];
    $Model = $row_cat['Model'];
    $Brand = $row_cat['Brand'];
    $Sunnah =$row_cat['Sunnah'];
    $Daily_rental_price =$row_cat['Daily_rental_price'];
    $condition =$row_cat['condition'];
    $imagecar =$row_cat['imagecar'];
} else 
    echo "<p>المدير غير موجود.</p>";
?>
    <form action="update_car.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <table class="form">
    <caption>Edit car</caption>
            
            <tr>
                <td><label for="Model">Model</label></td>
                <td><input type="Model" name="Model" id="Model" value="<?php echo $Model;?>"></td>
            </tr>
            <tr>
                <td><label for="Brand">Brand</label></td>
                <td><input type="Brand" name="Brand" id="Brand" value="<?php echo $Brand;?>"></td>
            </tr>
             <tr>
                <td><label for="Sunnah">Sunnah</label></td>
                <td><input type="Sunnah" name="Sunnah" id="Sunnah" value="<?php echo $Sunnah;?>"></td>
            </tr>
             <tr>
                <td><label for="Daily_rental_price">Daily_rental_price</label></td>
                <td><input type="Daily_rental_price" name="Daily_rental_price" id="Daily_rental_price" value="<?php echo $Daily_rental_price;?>"></td>
            </tr>
             <tr>
                <td><label for="condition">condition</label></td>
                <td><input type="condition" name="condition" id="condition" value="<?php echo $condition;?>"></td>
            </tr>
             <tr>
                <td><label for="imagecar">imagecar</label></td>
                <td><input file="imagecar" name="imagecar" id="imagecar" value="<?php echo $imagecar;?>"></td>
            </tr>
                <td colspan="2"><input type="submit" name="submit" value="تعديل"></td>
            </tr>
        </table>
    </form>
</body>
</html>