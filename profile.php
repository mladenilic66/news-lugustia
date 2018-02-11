<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["usr_id"])) { header("Location: http://news.lenuson.com"); }
?>

<?php include_once "header.php"; ?>

	<div class="main">
		<section class="profile_top"></section>
		<section class="profile_middle">
			<?php include_once "forms/form_profile.php"; ?>
		</section>
	</div>

<?php include_once "footer.php"; ?>