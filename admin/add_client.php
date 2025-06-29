<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_client</title>
<style>

    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f9fc;
      padding: 40px;
    }
    h2 {
      color: #31ADE7;
    }
    form {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      max-width: 500px;
      margin: auto;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #31ADE7;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      margin-top: 20px;
      cursor: pointer;
      font-weight: bold;
    }
    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .success {
      color: green;
    }
    .error {
      color: red;
    }
</style>
</head>
<body>
    <?php
    require_once('connect.php');
    if(isset($_POST['submit'])){
        $Customer_ID = $_POST['Customer_ID'];
        $Client_name= $_POST['Client_name'];
        $Phone = $_POST['Phone'];
        $date_of_birth = $_POST['date_of_birth'];
        $license = $_POST['license'];
        
        $sql = "INSERT INTO `client`
            (`Customer_ID`, `Client_name`, `Phone`, `ID_number`, `date_of_birth`, `license`) VALUES
            ('$Customer_ID', '$Client_name', '$Phone', '$ID_number', '$date_of_birth', '$license')";
        mysqli_query($conn, $sql);
        header('Location: client.php');
    }
    ?>
    
    <div class = "btn">
    <a  harf="client.php"></a>
</div>
<h1>Add new client</h1>
<form action="add_client.php" method="post" enctype="multipart/form-data">
<table class="form"> 
    <tr>
        <td><label for="Customer_ID">CustomerID</label></td>
        <td><input type="text" name="Customer_ID" id="Customer_ID"></td>
    </tr>
    <tr>
     <td><label for="Client_name">Client name</label></td>
        <td><input type="text" name="Client_name" id="Client_name"></td>
    </tr>
    <tr>
        <td><label for="Phone">Phone</label></td>
        <td><input type="text" name="Phone" id="Phone"></td>
    </tr>
    <tr>
        <td><label for="ID_number">ID_number</label></td>
        <td><input type="text" name="ID_number" id="ID_number"></td>
    </tr>
    <tr>
         <td><label for="date_of_birth">date_of_birth</label></td>
         <td><input type="text" name="date_of_birth" id="date_of_birth"></td>
    </tr>
    <tr>

    </tr>
        <td><label for="license">license</label></td>
        <td> <input type="text" name="license" id="license"></td>
    <tr>
        
        <td colspan="2"><input type="submit" name="submit" value="Add new  client➕"></td>

    </tr>
</table>
        </form>
    <?php
    

?>

    
</body>
</html>


