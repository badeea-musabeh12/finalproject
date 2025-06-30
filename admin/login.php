<?php
session_start();
?>
<!DOCTYPE html > 
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

    </head>
    <body>
        
       
    </body>
    <?php 

     if($_SERVER['REQUEST_METHOD']=='POST'){
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        require_once('connect.php');
        $sql = "SELECT * FROM `admin` WHERE `username` = '$user' AND  `password` = '$pass'";
        $res_admin = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res_admin) > 0){
            $row_admin = mysqli_fetch_array($res_admin);
            $_SESSION['id'] = $row_admin['admin_ID'];
            $_SESSION['name'] = $row_admin['name'];
            $_SESSION['username'] = $row_admin['username'];
            $_SESSION['role'] = 'admin';
            header ('location:car.php');

        }
        else{
            echo '<div class="error">Incorrect username or password</div>';
        }
     }
    
    ?>
    
     <form method = "post">
        <table class="form">
            <tr>
                <td><label for="user">username</label></td>
                <td><input type="text" name = "user" id="user"></td>
            </tr>
            <tr>
                <td><label for="pass">passowrd</label></td>
                <td><input type="password" name="pass" id="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login"></label></td>
                
            </tr>
        </table>
     </form>
    










</html>