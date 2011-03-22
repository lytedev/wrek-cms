<?php require_once("functions.php"); ?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php ecfg("sitename"); ?></title>
	<meta name="description" content="<?php ecfg("sitedescription"); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="css/style.css?v=2">
	<script src="js/libs/modernizr-1.6.min.js"></script>
</head>
<body>
	<div id="container">
		<header>
			<nav>
				<a href="<?php ecfg("root"); ?>/"><?php ecfg("sitename"); ?></a>
				<span class="column-space">&nbsp;</span>
				<a href="<?php ecfg("root"); ?>/blog.php">blog</a>
				<span class="column-space">&nbsp;</span>
				<a href="<?php ecfg("root"); ?>/downloads.php">downloads</a>
				<span class="column-space">&nbsp;</span>
				<a href="<?php ecfg("root"); ?>/about.php">about</a>
			</nav>			
			<div class="clearfix"></div>
		</header>

		<div id="main">