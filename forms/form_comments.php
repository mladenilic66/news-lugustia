<?php $id = $_GET['article']; ?>
<!-- comments form -->
<form action="http://news.lenuson.com/process?article=<?=$id?>" method="post">

	<div class="comment_heading">
	    <a name="com_label"><label for="comment">Leave a comment</label></a>
	</div>
	
	<div class="comment_btn">
	    <input class="submit_btn" type="submit" name="send_comment" value="submit">
	</div>

	<textarea id="comment" name="comment" rows="10"></textarea><br>
	
	<input type="hidden" name="form_id" value="comments">

	<?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>

        </div>

    <?php endif; ?>
	
</form>