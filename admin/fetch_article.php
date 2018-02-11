<?php
session_start();
include_once "../db_connect.php";
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);


//fetch article data
if(isset($_POST["query"])) {

	$search = mysqli_real_escape_string($con, $_POST["query"]);

	$query = "
	  SELECT article.*,author.firstname, author.lastname, CONCAT(firstname,' ',lastname) AS user FROM article INNER JOIN author ON article.id_user=author.id 
	  WHERE title LIKE '%".$search."%'
	  OR cat_title LIKE '%".$search."%'
	  OR date LIKE '%".$search."%'
	  OR firstname LIKE '%".$search."%'
	  OR lastname LIKE '%".$search."%'
	";

} else {
	$query = "SELECT article.*,author.firstname, author.lastname, CONCAT(firstname,' ',lastname) AS user FROM article INNER JOIN author ON article.id_user=author.id 
	ORDER BY `date` DESC";
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
				        <th>Title</th>
				        <th>Author</th>
				        <th>Category</th>
				        <th>Posted</th>
				        <th>Updated</th>
				    </tr>
			    </thead>

			    <tbody>

		        <?php while($row = mysqli_fetch_assoc($result)){ ?>

				    <tr class="result_row">
				    	<td>
				    		<label class="checkbox_label">
				    		    <input class="checkbox_each" type="checkbox" name="delete[]" value="<?=$row['id']?>">
				    		    <span></span>
				    	    </label>
				    	</td>
				        <td class="edit_title">
				        	<a href="http://news.lenuson.com/details?category=<?=$row["cat_title"]?>&article=<?=$row['id']?>&title=<?=url_rewrite($row['title'])?>"><?=$row["title"]?>&nbsp;
				        	<a class="edit" href="http://news.lenuson.com/admin/article?action=edit&article=<?=$row['id']?>">Edit</a>
				        </td>
				        <td><?=$row["user"]?></td>
				        <td><?=$row["cat_title"]?></td>
				        <td><?=$row["date"]?></td>
				        <td><?=$row["updated"]?></td>
				    </tr>
			    
	           <?php } ?>

	           </tbody>

		        <tfoot>
		            <tr>
		        	    <th><button class="btn_delete" type="submit" name="del"><i class="fa fa-trash" aria-hidden="true"></i></button></th>
		                <th>Title</th>
		                <th>Author</th>
		                <th>Category</th>
		                <th>Posted</th>
		                <th>Updated</th>
		            </tr>
		        </tfoot>
		    </table>

		    <input type="hidden" name="form_id" value="delete_article">

	    </form>

	    <div class="table_info">
	        <span class="counter"><?="Articles (".$num.")"?></span>
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
			        <th>Title</th>
	                <th>Author</th>
			        <th>Category</th>
			        <th>Posted</th>
		            <th>Updated</th>
			    </tr>
		    </thead>

	        <tfoot>
	            <tr>
	                <th>Title</th>
	                <th>Author</th>
	                <th>Category</th>
	                <th>Posted</th>
		            <th>Updated</th>
	            </tr>
	        </tfoot>
	    </table>

        <div class="table_info">
	        <span><?="Articles (".$num.")"?></span>
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
	    $(".btn_delete").click(function () {
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