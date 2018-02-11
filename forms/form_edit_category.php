<?php
include_once "../db_connect.php";
      
$id = $_GET['category']; 
$sql = "SELECT * FROM category WHERE id='".$id."'";
$result = mysqli_query($con, $sql);
$rw = mysqli_fetch_assoc($result);

?>
<!-- category edit form -->

<form  id="category_edit_form" action="http://news.lenuson.com/process?category=<?=$id?>" method="post">
    
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
        <h4>New category title</h4>
        <input id="category" type="text" name="category" value="<?=$rw['cat_title']?>"><br>
    </div>

    <input type="hidden" name="form_id" value="edit_category">

    <div class="admin_inputs">
        <input class="btn_submit" type="submit" name="edit_category" value="update">
    </div>
</form>