<?php
include_once "../functions/functions.php";
session_start();
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);
?>

<?php include_once "header.php"; ?>

<div class="main">
	<div class="content">

        <?php

        if (isset($_GET['action']) && $_GET['action'] == "edit" && $_SESSION["usr_role"] == 1) { 

        	include_once "../forms/form_edit_category.php"; 

        } else {

        ?>

        <?php if(isset($_SESSION["usr_id"]) && $_SESSION["usr_role"] == 1): ?>
			<div>
				<?php include_once "../forms/form_add_category.php"; ?>
			</div>
        <?php endif; ?>

		<div class="search_admin">
			<div class="search_admin_wrap">
				<div>
				    <h3 class="search_admin_header">All Categories</h3>
				</div>
			    <div class="search_admin_inputs">
			        <input id="cat_search" type="text" name="cat_search" placeholder="Search Categories">
			    </div>
		    </div>
        </div>

        <div class="categories_result"></div>

        <?php } ?>

	</div>
</div>

<?php include_once "footer.php"; ?>