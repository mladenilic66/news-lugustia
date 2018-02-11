<?php
include_once "db_connect.php";
include_once "functions/functions.php";
session_start();
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title><?=tab_name()?></title>
	<meta name="viewport" content="width=device-width">
	<meta name="msapplication-TileColor" content="#191919">
	<meta name="msapplication-TileImage" content="http://news.lenuson.com/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#191919">
	<link rel="apple-touch-icon" sizes="57x57" href="http://news.lenuson.com/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://news.lenuson.com/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://news.lenuson.com/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://news.lenuson.com/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://news.lenuson.com/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://news.lenuson.com/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://news.lenuson.com/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://news.lenuson.com/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://news.lenuson.com/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="http://news.lenuson.com/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://news.lenuson.com/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://news.lenuson.com/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://news.lenuson.com/favicon/favicon-16x16.png">
	<link rel="manifest" href="http://news.lenuson.com/favicon/manifest.json">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,800&amp;subset=cyrillic" rel="stylesheet">
	<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header id="header">
	    <div id="top">
	    	<nav class="pages nav font_b">
	    		<div id="logo"></div>
	    		<ul class="list_pages_btn">
	        		<li>
	        			<a href="#" class="btn_pages"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Menu</a>
	        		</li>
	        	</ul>
			    <ul class="list_pages text-black">
				    <li><a href="/">home</a></li>
				    <li><a href="about">about</a></li>
				    <li><a href="contact">contact</a></li>
				</ul>
			</nav>
			<div class="user font_l">
				<ul>
				<?php if (isset($_SESSION['usr_id'])):

				    if ($_SESSION['usr_role'] == 1 || $_SESSION["usr_role"] == 4): ?>

			            <li><a href="admin/dashboard"><i class="fa fa-th" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
			        
                    <?php endif; ?>

			        <li>
			        	<span class="user_link" style="<?php if($_SESSION['usr_role'] == 1 || $_SESSION["usr_role"] == 4) { echo 'color: #87BDB7'; } ?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$_SESSION['usr_name']?>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></span>
			        	<ul class="user_dropdown">
			        		<li><a href="profile">Profile</a></li>
			        		<li><?php include_once "forms/form_logout.php"; ?></li>
			        	</ul>
			        </li>

			    <?php else: ?>

			        <li class="login_link"><a href="http://news.lenuson.com/?user=Login"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Login</a>
                        <ul class="login_dropdown">
			        		<li><?php include_once "forms/form_login_small.php"; ?></li>
			        	</ul>
			        </li>
			        <li><a href="http://news.lenuson.com/?user=Register">Register</a></li>

			    <?php endif; ?>

			    </ul>
			</div>
		</div>
		
		<section id="head">

	    </section>

	    <div id="navigation">
	        <nav class="cat nav font_l">
	        	<ul class="list_categories_btn">
	        		<li>
	        			<a href="#" class="btn_categories"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Categories</a>
	        		</li>
	        	</ul>
			    <ul class="list_categories">
				    <?php
	                    $sql = "SELECT cat_title FROM category";
	                    $result = mysqli_query($con,$sql);

	                    while ($row = mysqli_fetch_assoc($result)):
					?>
				    <li><a href="http://news.lenuson.com/?category=<?=$row['cat_title']?>"><?=$row['cat_title']?></a></li>
					<?php endwhile; ?>
				</ul>
			</nav>
		</div>

    </header>