<?php
include_once "../db_connect.php";
include_once "../functions/functions.php";
session_start();
authorization($_SESSION["usr_id"],$_SESSION["usr_role"],1,4);
?>

<?php include_once "header.php"; ?>

	<div class="main">
	    <div class="content">
			<?php if (isset($_SESSION["usr_id"])): ?>
				<h3 class="welcome">Welcome back <span class="usr_name"><?=$_SESSION['usr_name']?></span></h3>
			<?php endif; ?>

	        <div class="total">
				<div class="total_all">
					<?php $total = mysqli_num_rows(mysqli_query($con,"SELECT id FROM article")); ?>
					<h4>Articles</h4>
					<i class="fa fa-files-o" aria-hidden="true"></i>
					<h4><?=$total?></h4>
				</div>
				<div class="total_all">
					<?php $total = mysqli_num_rows(mysqli_query($con,"SELECT id FROM author")); ?>
					<h4>Users</h4>
					<i class="fa fa-users" aria-hidden="true"></i>
					<h4><?=$total?></h4>
				</div>
				<div class="total_all">
					<?php $total = mysqli_num_rows(mysqli_query($con,"SELECT id FROM category")); ?>
					<h4>Categories</h4>
					<i class="fa fa-th-list" aria-hidden="true"></i>
					<h4><?=$total?></h4>
				</div>
				<div class="total_all">
					<?php $total = mysqli_num_rows(mysqli_query($con,"SELECT id FROM comments")); ?>
					<h4>Comments</h4>
					<i class="fa fa-comments" aria-hidden="true"></i>
					<h4><?=$total?></h4>
				</div>
			</div>
		</div>
	</div>

<?php include_once "footer.php"; ?>