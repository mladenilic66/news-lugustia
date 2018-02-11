<?php
session_start();
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);
?>

<?php include_once "header.php"; ?>

<div class="main">
	<div class="content">

		<?php

		if (isset($_GET['action']) && $_GET['action'] == "edit" && $_SESSION["usr_role"] == 1) {

			include_once "../forms/form_edit_user.php";

		} else {

		?>

		<div class="search_admin">
			<div class="search_admin_wrap">
				<div>
				    <h3 class="search_admin_header">All Users</h3>
				</div>
			    <div class="search_admin_inputs">
			        <input id="usr_search" type="text" name="usr_search" placeholder="Search Users">
			    </div>
		    </div>
        </div>

        <div class="user_result"></div>

        <?php } ?>

	</div>
</div>

<?php include_once "footer.php"; ?>