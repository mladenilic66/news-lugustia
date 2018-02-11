<?php

include_once "../db_connect.php";
require_once "../functions/functions.php";
      
$id = $_GET['article']; 
$sql = "SELECT * FROM article WHERE id=".$id;
$result = mysqli_query($con, $sql);
$rw = mysqli_fetch_assoc($result);

?>
<!-- article edit form -->

<form  id="article_edit_form" action="http://news.lenuson.com/process?article=<?=$id?>" method="post" enctype="multipart/form-data">
    
    <?php if(isset($_SESSION["msg"])): ?>

        <div class="msg">
            
            <p class="msg_info"><?=$_SESSION["msg"]?></p>

            <?php  unset($_SESSION["msg"]);  ?>

            <div class="remove">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>

        </div>

        <div class="article_permalink">
            <a class="msg_info" href="http://news.lenuson.com/details?category=<?=$rw['cat_title']?>&article=<?=$id?>&title=<?=url_rewrite($rw['title'])?>">Link: http://news.lenuson.com/details?category=<?=$rw['cat_title']?>&article=<?=$id?>&title=<?=url_rewrite($rw['title'])?></a>
        </div>

    <?php endif; ?>

    <div class="admin_inputs">
        <h4>New head title</h4>
        <input id="title" type="text" name="title" value="<?=$rw['title']?>"><br>
        <span id="add_article_error" class="form_errors"></span>
    </div>

    <div class="admin_inputs">
        <div class="admin_inputs_in">
            <label for="categories">Change category</label>
            <select id="categories" name="categories">

                <option selected="selected" value="<?=$rw["cat_title"]?>"><?=$rw["cat_title"]?></option>
                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($con,$sql);

                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                <option value="<?=$row["cat_title"]?>"><?=$row["cat_title"]?></option>

                <?php endwhile; ?>
            </select>
        </div>
        
        <div class="admin_inputs_in">
            <label for="image">Change main image</label>
            <input id="image" type="file" name="image">
        </div>
     </div>

    <div class="admin_inputs">
        <textarea name="content" id="content" rows="60"><?=$rw['content']?></textarea><br>
    </div>

    <input type="hidden" name="form_id" value="edit_article">

    <div class="admin_inputs">
        <input class="btn_submit" type="submit" name="edit_article" value="apply">
    </div>
</form>