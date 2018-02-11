<?php
session_start();
include_once "../db_connect.php";
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);

//fetch article data
if(isset($_POST["comm"])) {

	$search = mysqli_real_escape_string($con, $_POST["comm"]);

	$query = "
	  
	SELECT comments.*,author.username AS author_name ,article.title AS article_title ,article.cat_title AS cat_title ,author.avatar 
	FROM comments 
	INNER JOIN author ON comments.id_user=author.id 
	INNER JOIN article ON comments.id_article=article.id
	WHERE comment LIKE '%".$search."%'
	OR comments.date LIKE '%".$search."%'
	OR author.username LIKE '%".$search."%'
	OR article.title LIKE '%".$search."%'
	OR comments.date LIKE '%".$search."%'

	";

} else {
	$query = "

	SELECT comments.*,author.username AS author_name ,article.title AS article_title ,article.cat_title AS cat_title ,author.avatar FROM comments 
	INNER JOIN author ON comments.id_user=author.id
	INNER JOIN article ON comments.id_article=article.id 
	ORDER BY comments.date DESC

	";
}

$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if(mysqli_num_rows($result) > 0) { ?>

	<div class="table_wrap clearfix">
		<form action="http://news.lenuson.com/process" method="post">
		   <table class="table_main">
			   <thead>
			        <tr>
			        	<th>
			        		<label class="checkbox_label">
			        		    <input class="checkbox_all" type="checkbox" name="checkbox">
			        		    <span></span>
			        	    </label>
			        	</th>
			        	<th>Avatar</th>
				        <th>Commenter</th>
				        <th>Comment</th>
				        <th>Response to</th>
				        <th>Submitted on</th>
				    </tr>
			    </thead>

			    <tbody>

		        <?php while($row = mysqli_fetch_assoc($result)): ?>

				    <tr class="result_row">
				    	<td>
				    		<label class="checkbox_label">
				    		    <input class="checkbox_each" type="checkbox" name="delete[]" value="<?=$row['id']?>">
				    		    <span></span>
				    	    </label>
				    	</td>
				    	<td>
				    		<div class="user_tumbnail">
				    		    <?=img_switch($row['avatar'],"../uploads/user_images/","../uploads/user_images/user.png","user_tumbnail")?>
				    		</div>
				    	</td>
				        <td><?=$row["author_name"]?></td>
				        <td class="edit_title">
				        	<a href="http://news.lenuson.com/details?category=<?=$row['cat_title']?>&article=<?=$row['id_article']?>&title=<?=url_rewrite($row['article_title'])?>#anchor_com">
				        		<?=$row["comment"]?></a>&nbsp;
				        	<a class="edit" href="http://news.lenuson.com/admin/comments?action=edit&comment=<?=$row['id']?>">Edit</a>
				        </td>
				        <td>
				        	<a href="http://news.lenuson.com/details?category=<?=$row['cat_title']?>&article=<?=$row['id_article']?>&title=<?=url_rewrite($row['article_title'])?>">
				        		<?=$row["article_title"]?></a>&nbsp;
				        </td>
				        <td><?=$row["date"]?></td>
				    </tr>
			    
	           <?php endwhile; ?>

	           </tbody>

		        <tfoot>
		            <tr>
		        	    <th><button class="btn_delete" type="submit" name="del"><i class="fa fa-trash" aria-hidden="true"></i></button></th>
		        	    <th>Avatar</th>
		                <th>Commenter</th>
		                <th>Comment</th>
		                <th>Response to</th>
				        <th>Submitted on</th>
		            </tr>
		        </tfoot>
		    </table>

		    <input type="hidden" name="form_id" value="delete_comments">

	    </form>

	    <div class="table_info">
	        <span class="counter"><?="Comments (".$num.")"?></span>
	        <?php if ($num >= 20): ?>
			    <a href="#" id="load_more"><i class="fa fa-caret-down" aria-hidden="true"></i>&nbsp;Load More</a>
		    <?php endif; ?>
	    </div>

	</div>

    <?php } else { ?>

    <div class="table_wrap clearfix">
	   <table class="table_main">
		   <thead>
		        <tr>
		        	<th>Avatar</th>
	                <th>Commenter</th>
			        <th>Comments</th>
			        <th>Response to</th>
				    <th>Submitted on</th>
			    </tr>
		    </thead>

	        <tfoot>
	            <tr>
	            	<th>Avatar</th>
	                <th>Commenter</th>
	                <th>Comments</th>
	                <th>Response to</th>
				    <th>Submitted on</th>
	            </tr>
	        </tfoot>
	    </table>

        <div class="table_info">
	        <span><?="Comments (".$num.")"?></span>
	    </div>

	</div>

<?php } ?>

<script>
	$(function(){
	    $(".checkbox_all").click(function(){
	        $(".checkbox_each").prop("checked", this.checked);
	    });
	});

	$(function(){
	    $('.btn_delete').click(function () {
	        return confirm("Are you sure you want to delete this?");
	    });
	});

	$(function(){
	    $(".edit_title").hover(function () {
	        $(".edit").toggle();
	    });
	});
</script>
<script>
	// load more data
	$(function () {
	    $(".result_row").slice(0, 20).show();
	    $("#load_more").on('click', function (e) {
	        e.preventDefault();
	        $(".result_row:hidden").slice(0, 20).slideDown();

	        if ($(".result_row:hidden").length == 0) {
	            $("#load").fadeOut('slow');
	        }
	        
	        $("html,body").animate({
	            scrollTop: $(this).offset().top
	        }, 2000);
	    });
	});
</script>