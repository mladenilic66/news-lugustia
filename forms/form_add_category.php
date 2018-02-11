<!-- add category form -->

<form  id="add_category_form" action="http://news.lenuson.com/process" method="post">
    
    <?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>

        </div>

    <?php endif; ?>

    <div class="admin_inputs">
        <h4>Add new category</h4>
        <div class="category_wrap">

            <input id="category" type="text" name="category" placeholder="Enter category title">

            <div class="btn_wrap">
                <button class="btn_add" type="submit" name="add_category">submit</button>
            </div>

        </div>
        <span id="category_error" class="form_errors"></span>
    </div>

    <input type="hidden" name="form_id" value="add_category">
    
</form>