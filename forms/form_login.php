<!-- login form -->
<form id="login_form" action="http://news.lenuson.com/process" method="post">
    <div class="log_reg_inner">

        <div class="log_reg_inputs">
            <input id="username_l" type="text" name="username" placeholder="Username">
        </div>
        <div class="log_reg_inputs">
            <input id="password_l" type="password" name="password" placeholder="Password"><br>
        </div>
    	
        <div class="log_reg_btn">
            <input type="submit" name="login" value="log in">
        </div>

        <?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>

        </div>

        <?php endif; ?>

        <input type="hidden" name="form_id" value="login">
        
    </div>
</form>