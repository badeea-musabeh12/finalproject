<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>حذف السيارة</title>
  <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<?php
  include_once('include/header.php');
  include_once('include/menu.php');
  require_once('include/connect.php');

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
      $sql = "SELECT * FROM author WHERE id = $id";
      $res_author = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res_author) > 0) {
        $row_car = mysqli_fetch_assoc($res_car);
?>
        <form action="car_remove.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <table class="form">
            <caption>هل تريد بالتأكيد حذف هذه السيارة؟</caption>
            <tr>
              <td><?php echo $row_author['name']; ?></td>
              <td>
                <input type="text" name="name" value="<?php echo $row_author['name']; ?>">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="نعم">
              </td>
            </tr>
          </table>
        </form>
<?php
      } else {
        header("Location: car_show.php");
      }
    } else {
      header("Location: car_show.php");
    }
  } else {
    header("Location: car_show.php");
  }

  include_once('include/footer.php');
?>
</body>
</html>
