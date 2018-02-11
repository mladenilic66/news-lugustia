<?php
include_once "../db_connect.php";

$id = $_GET['user'];

$sql = "SELECT author.*,roles.name FROM author INNER JOIN roles ON author.role_id=roles.id WHERE author.id=".$id;
$result = mysqli_query($con, $sql);
$rw = mysqli_fetch_assoc($result);

if ($id != 1) {

?>

<?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>

        </div>

    <?php endif; ?>


<!-- user edit form -->
<form  id="user_edit_form" action="http://news.lenuson.com/process?user=<?=$id?>" method="post" enctype="multipart/form-data">

    <table class="admin_user_table">
        <tr>
            <th colspan="2">Edit User</th>
        </tr>
        <tr>
            <th>Username</th>
            <td>
                <input id="username_edit" type="text" name="username_edit" value="<?=$rw['username']?>" disabled><br>
            </td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>
                <input id="email_edit" type="text" name="email_edit" value="<?=$rw['email']?>"><br>
                <span id="email_edit_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>
                <input id="first_name_edit" type="text" name="first_name_edit" value="<?=$rw['firstname']?>" disabled><br>
                <span id="first_name_edit_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>
                <input id="last_name_edit" type="text" name="last_name_edit" value="<?=$rw['lastname']?>" disabled><br>
                <span id="last_name_edit_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Bio</th>
            <td>
                <textarea id="bio_edit" name="bio_edit" disabled><?=$rw['bio']?></textarea>
            </td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                <input id="avatar_edit" class="image" type="file" name="avatar_edit" disabled>
            </td>
        </tr>
        <tr>
            <th>Role</th>
            <td>
                <select id="roles_edit" name="roles_edit">

                    <option selected="selected" value="<?=$rw['role_id']?>"><?=$rw['name']?></option>

                    <?php
                        $sql = "SELECT * FROM roles";
                        $result = mysqli_query($con,$sql);
                    ?>

                    <?php  while ($rw = mysqli_fetch_assoc($result)): ?>

                    <option value="<?=$rw['id']?>"><?=$rw['name']?></option>

                    <?php endwhile; ?>

                </select>
            </td>
        </tr>  
        <tr>
            <td colspan="2">
                <input class="btn_submit" type="submit" name="edit_user" value="update">
            </td>
        </tr>

        <input type="hidden" name="form_id" value="edit_user">

    </table>
</form>
<?php } ?>