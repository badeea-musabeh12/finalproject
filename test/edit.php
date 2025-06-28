<?php
// include_once('include/header.php');
// include_once('include/menu.php');
require_once('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id)) {
        $sql = "SELECT * FROM author WHERE id = $id";
        $res_author = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res_author) > 0) {
            $row_author = mysqli_fetch_assoc($res_author);
?>

<form action="author_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <table class="form">
        <caption>تعديل بيانات</caption>
        <tr>
            <td><label for="name"> Edit</label></td>
            <td>
                <input type="text" name="name" id="name" 
                       value="<?php echo htmlspecialchars($row_author['name']); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="تعديل">
            </td>
        </tr>
    </table>
</form>

<?php
        } else {
            header("Location: author_show.php");
            exit;
        }
    } else {
        header("Location: author_show.php");
        exit;
    }
} else {
    header("Location: author_show.php");
    exit;
}

include_once('include/footer.php');
?>