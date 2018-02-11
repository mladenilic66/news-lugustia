<!-- contact form -->
<form id="contact_form" action="http://news.lenuson.com/process" method="post">

        <div class="log_reg_inputs">
            <input id="name" type="text" name="name" placeholder="Name">
        </div>
        <div class="log_reg_inputs">
            <input id="email" type="text" name="email" placeholder="E-mail"><br>
        </div>
        <div class="log_reg_inputs">
            <textarea id="message" name="message" placeholder="Message"></textarea><br>
        </div>
    	
        <div class="log_reg_btn">
            <input type="submit" name="contact" value="submit">
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

        <input type="hidden" name="form_id" value="contact">
</form>