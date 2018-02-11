<!-- register form -->
<form  id="register_form" action="http://news.lenuson.com/process" method="post" enctype="multipart/form-data">
    <div class="log_reg_inner">
        <div class="log_reg_inputs">
            <input id="username_r" type="text" name="username_r" placeholder="Username"><br>
            <span id="username_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <input id="email_r" type="text" name="email_r" placeholder="E-mail"><br>
            <span id="email_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <input id="first_name_r" type="text" name="first_name_r" placeholder="First Name"><br>
            <span id="first_name_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <input id="last_name_r" type="text" name="last_name_r" placeholder="Last Name"><br>
            <span id="last_name_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <input id="password_r" type="password" name="password_r" placeholder="Password"><br>
            <span id="password_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <input id="password_rpt_r" type="password" name="password_rpt_r" placeholder="Repeat Password"><br>
            <span id="password_rpt_r_error" class="form_errors"></span>
        </div>
        <div class="log_reg_inputs">
            <label for="avatar">Avatar</label>
            <input id="avatar" class="image" type="file" name="avatar" accept="image/jpg,image/png,image/jpeg">
        </div>

        <input type="hidden" name="form_id" value="register">

        <div class="log_reg_btn">
            <input type="submit" name="register" value="register">
        </div>

        <?php if(isset($_SESSION["msg"])): ?>

            <div class="msg">
                
                <p class="msg_info"><?=$_SESSION["msg"]?></p>

                <?php  unset($_SESSION["msg"]); ?>

                <div class="remove">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>

            </div>

        <?php endif; ?>
    </div>
</form>