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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delet client</title>
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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgb(255, 255, 255);
            padding: 20px;
        }

        .form {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background-color: #38a6dd;
            padding: 20px;
            border-radius: 10px;}
</style>

    
   <?php
   

require_once('menu.php');
require_once('connect.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(is_numeric($id)){
        $sql = "SELECT * FROM client WHERE customer_id = $id";
        $res_client = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res_client) > 0){
            $row_client = mysqli_fetch_assoc($res_client);
?>
<form action="remove_client.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <table class="form">
        <caption>delete client</caption>
        <tr>
            <td>Are you sure you want to delete?<?php echo $row_client['customer_ID']; ?>؟</td>
            <td><input type="submit" name="yes" value="yes"></td>
            <td><input type="submit" name="no" value="no"></td>
        </tr>
    </table>
</form>
<?php
        }
        else{
            header("Location: client.php");
        }
    }       
    else{
        header("Location: client.php");
    }
}
else{
    header("Location: client.php");
}
?>
<?php
//include_once('include/footer.php');
?>
</body>
</html>