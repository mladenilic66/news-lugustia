<?php

include_once "../db_connect.php";
      
$id = $_GET['comment']; 
$sql = "SELECT * FROM comments WHERE id='".$id."'";
$result = mysqli_query($con, $sql);
$rw = mysqli_fetch_assoc($result);

?>
<!-- comment edit form -->

<form  id="comment_edit_form" action="http://news.lenuson.com/process?comment=<?=$id?>" method="post">
    
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
        <h4>Edit Comment</h4><br>
        <textarea name="comment" id="comment" rows="20"><?=$rw['comment']?></textarea><br>
        <span id="comment_error" class="form_errors"></span>
    </div>

    <input type="hidden" name="form_id" value="edit_comment">

    <div class="admin_inputs">
        <input class="btn_submit" type="submit" name="edit_comment" value="apply">
    </div>
</form>