
<!-- add user form -->
<?php if(isset($_SESSION["msg"])): ?>

    <div class="msg">
        
        <p class="msg_info"><?=$_SESSION["msg"]?></p>

        <?php  unset($_SESSION["msg"]);  ?>

        <div class="remove">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>

    </div>

<?php endif; ?>
<form  id="add_user_form" action="http://news.lenuson.com/process" method="post" enctype="multipart/form-data">
    <table class="admin_user_table">
        <tr>
            <th colspan="2">Add Users</th>
        </tr>
        <tr>
            <th>Username</th>
            <td>
                <input id="username_a" type="text" name="username_a" placeholder="Username"><br>
                <span id="username_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>
                <input id="email_a" type="text" name="email_a" placeholder="E-mail"><br>
                <span id="email_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>
                <input id="first_name_a" type="text" name="first_name_a" placeholder="First Name"><br>
                <span id="first_name_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>
                <input id="last_name_a" type="text" name="last_name_a" placeholder="Last Name"><br>
                <span id="last_name_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Password</th>
            <td>
                <input id="password_a" type="password" name="password_a" placeholder="Password"><br>
                <span id="password_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Repeat Password</th>
            <td>
                <input id="password_rpt_a" type="password" name="password_rpt_a" placeholder="Repeat Password"><br>
                <span id="password_rpt_a_error" class="form_errors"></span>
            </td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                <input id="avatar_a" class="image" type="file" name="avatar_a" accept="image/jpg,image/png,image/jpeg">
            </td>
        </tr>
        <tr>
            <th>Role</th>
            <td>
                <select id="roles_a" name="roles_a">
                    <?php
                        $sql = "SELECT * FROM roles";
                        $result = mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_assoc($result)):
                    ?>
                        <option value="<?=$row["id"]?>"><?=$row["name"]?></option>

                    <?php endwhile; ?>
                </select>
            </td>
        </tr>  
        <tr>
            <td colspan="2">
                <input class="btn_submit" type="submit" name="add_user" value="submit">
            </td>
        </tr>

        <input type="hidden" name="form_id" value="add_user">

    </table>
    
</form>