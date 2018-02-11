<?php
session_start();
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);
?>

<?php include_once "header.php"; ?>
	
	<div class="main">
	    <div class="content">

	    	<?php if (isset($_GET['action']) && $_GET['action'] == "edit") { include_once "../forms/form_edit_comment.php"; } else { ?>

            <div class="search_admin">
				<div class="search_admin_wrap">
					<div>
				    	<h3 class="search_admin_header">All Comments</h3>
				    </div>
				    <div class="search_admin_inputs">
				        <input id="comm_search" type="text" name="comm_search" placeholder="Search Comments">
				    </div>
			    </div>
            </div>
            <div class="comments_result"></div>

            <?php } ?>

		</div>
	</div>

<?php include_once "footer.php"; ?>