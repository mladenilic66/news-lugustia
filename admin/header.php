<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#191919">
    <title><?=tab_name()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">
	<link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/admin.css" rel="stylesheet" type="text/css">
    <link href="../css/admin_responsive.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="sidebar">
        <div class="sidebar_content">
            <ul class="menu_links">
                <?php $active = basename($_SERVER['PHP_SELF'], ".php"); ?>
                <li class="<?= ($active == 'dashboard') ? 'active': ''; ?>">
                    <a href="dashboard"><i class="fa fa-th" aria-hidden="true"></i>&nbsp; Dashboard</a>
                </li>
                <li class="<?= ($active == 'article') ? 'active': ''; ?> article_link">
                    <a href="article"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp; Articles</a>
                    <ul class="new_article">
                        <li class="<?= ($active == 'new_article') ? 'active': ''; ?>">
                            <a href="new_article"> + Add article</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= ($active == 'users') ? 'active': ''; ?> user_link">
                    <a href="users"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Users</a>
                    <ul class="new_user">
                        <li class="<?= ($active == 'new_user') ? 'active': ''; ?>">
                            <a href="new_user"> + Add user</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= ($active == 'categories') ? 'active': ''; ?> category_link">
                    <a href="categories"><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Categories</a>
                </li>
                <li class="<?= ($active == 'comments') ? 'active': ''; ?>">
                    <a href="comments"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comments</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="header">
        <a href="#" class="menu">
            <div id="nav_burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>

        <div class="header_content">

            <div class="user_nav">
                <a href="http://news.lenuson.com"><?=$_SERVER['HTTP_HOST']?></a>
            </div>
            <div class="user_nav">
                <a href="javascript: void(0)" id="date"></a>
            </div>

            <?php if (isset($_SESSION['usr_id'])): ?>
                <div class="user_dropdown">
                    <p class="dropbtn"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;<?=$_SESSION['usr_name']?>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></p>
                    <div class="dropdown_content">
                        <a href="http://news.lenuson.com/profile">Profile</a>
                        <div class="logout_form">
                            <?php include "../forms/form_logout.php"; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>