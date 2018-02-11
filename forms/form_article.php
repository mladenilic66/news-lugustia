<!-- article form -->

<form  id="article_form" action="http://news.lenuson.com/process" method="post" enctype="multipart/form-data">
    
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
        <h4>Enter head title</h4>
        <input id="title" type="text" name="title" placeholder="Enter Title"><br>
        <span id="add_article_error" class="form_errors"></span>
    </div>

    <div class="admin_inputs">
        <div class="admin_inputs_in">
            <label for="categories">Choose category</label>
            <select id="categories" name="categories">
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
            <label for="image">Choose main image</label>
            <input id="image" type="file" name="image">
        </div>
     </div>

    <div class="admin_inputs">
        <textarea name="content" id="content" rows="30"></textarea><br>
    </div>

    <input type="hidden" name="form_id" value="add_article">

    <div class="admin_inputs">
        <input class="btn_submit" type="submit" name="add_article" value="Add">
    </div>
</form>