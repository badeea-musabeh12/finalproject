<?php
session_start();
?>
<!DOCTYPE html > 
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <titel>Admin login</titel>
        
    </head>
    <body></body>
    <?php 

     if($_SERVER['REQUEST_METHOD']=='POST'){
        $user = validate_input($_POST['pass']);
        $pass = anc_pw(validate_input($_POST['pass']));
        require_once('connect.php');
        $sql = "SELECT * FROM `admin` WHERE `username` = '$user' AND  `password` = '$pass'";
        $res_admin = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res_admin) > 0){
            $row_admin = mysqli_query_fetch_array($res_admin);
            $_SESSION['id'] = $row_admin['id'];
            $_SESSION['name'] = $row_admin['name'];
            $_SESSION['username'] = $row_admin['username'];
            $_SESSION['password'] = enc_pw($row_admin['password']);
            header ('location:car.php');

        }
        else{
            echo '<div class="error">Incorrect username or password</div>';
        }
     }
    
    ?>
       
     <form action="">
        <table class="form">
            <tr>
                <td><label for="user">username</label></td>
                <td><input type="text" name = "user" id="user"></td>
            </tr>
            <tr>
                <td><label for="pass">passowrd</label></td>
                <td><input type="passowrd" name="pass" id="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login"></label></td>
                
            </tr>
        </table>
     </form>
    










</html>