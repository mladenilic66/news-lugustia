<?php
session_start();
include_once "../db_connect.php";
include_once "../functions/functions.php";
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);
?>

<?php include_once "header.php"; ?>

<div class="main">
	<div class="content">
		<?php include_once "../forms/form_article.php"; ?>
	</div>
</div>

<?php include_once "footer.php"; ?>