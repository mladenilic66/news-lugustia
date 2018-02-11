<?php
session_start();
include_once "../db_connect.php";
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);

//fetch user data
if(isset($_POST["cat"])) {

	$search = mysqli_real_escape_string($con, $_POST["cat"]);

	$query = "
	  SELECT * FROM category 
	  WHERE cat_title LIKE '%".$search."%'
	  OR created LIKE '%".$search."%'
	";
} else {
	$query = "
	  SELECT * FROM category 
	  ORDER BY created DESC";
}

$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if($num > 0) { ?>

	<div class="table_wrap clearfix">
		<form action="http://news.lenuson.com/process" method="post">
		   <table class="table_main">
			   <thead>
			        <tr>
			        	<?php if ($_SESSION["usr_role"] == 1): ?>
			        	<th>
			        		<label class="checkbox_label">
			        		    <input class="checkbox_all" type="checkbox" name="checkbox">
			        		    <span></span>
			        	    </label>
			        	</th>
			        	<?php endif; ?>
			        	<th>Title</th>
				        <th>Created</th>
		                <th>Updated</th>
				    </tr>
			    </thead>

			    <tbody>

		        <?php while($row = mysqli_fetch_assoc($result)){ ?>

				    <tr class="result_row">
				    	<?php if ($_SESSION["usr_role"] == 1): ?>
				    	<td>
				    		<label class="checkbox_label">
				    		    <input class="checkbox_each" type="checkbox" name="delete[]" value="<?=$row['id']?>">
				    		    <span></span>
				    	    </label>
				    	</td>
				    	<?php endif; ?>
				        <td class="edit_title">
				        	<a href="http://news.lenuson.com/?category=<?=$row['cat_title']?>"><?=$row["cat_title"]?></a>&nbsp;

				        	<?php if ($_SESSION["usr_role"] == 1): ?>
				        	    <a class="edit" href="http://news.lenuson.com/admin/categories?action=edit&category=<?=$row['id']?>">Edit</a>
				        	<?php endif; ?>
				        </td>
				        <td><?=$row["created"]?></td>
				        <td><?=$row["updated"]?></td>
				    </tr>
			    
	           <?php } ?>

	           </tbody>

		        <tfoot>
		            <tr>
		            	<?php if ($_SESSION["usr_role"] == 1): ?>
		            	<th><button class="btn_delete" type="submit" name="del"><i class="fa fa-trash" aria-hidden="true"></i></button></th>
			        	<?php endif; ?>
			        	<th>Title</th>
		                <th>Created</th>
		                <th>Updated</th>
		            </tr>
		        </tfoot>
		    </table>

		    <input type="hidden" name="form_id" value="delete_categories">

	    </form>

	    <div class="table_info">
	        <span class="counter"><?="Categories (".$num.")"?></span>
	        <?php if ($num > 10): ?>
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
			        <th>Created</th>
		            <th>Updated</th>
			    </tr>
		    </thead>

	        <tfoot>
	            <tr>
	            	<th>Title</th>
			        <th>Created</th>
		            <th>Updated</th>
	            </tr>
	        </tfoot>
	    </table>
	    <div class="table_info">
	        <span><?="Categories (".$num.")"?></span>
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
	    $(".result_row").slice(0, 10).show();
	    $("#load_more").on('click', function (e) {
	        e.preventDefault();
	        $(".result_row:hidden").slice(0, 10).slideDown();

	        if ($(".result_row:hidden").length == 0) {
	            $("#load").fadeOut('slow');
	        }
	        
	        $("html,body").animate({
	            scrollTop: $(this).offset().top
	        }, 2000);
	    });
	});
</script>