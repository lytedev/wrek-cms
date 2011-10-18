<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo getTitle(); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php echo ($f = themeFile("style.css")) != false ? "<link rel=\"stylesheet\" href=\"" . $f . "\" />" : ""; ?>
	<?php echo ($f = "favicon.ico") != false ? "<link rel=\"shortcut icon\" href=\"" . $f . "\" />" : ""; ?>
	<script src="<?php echo getRoot(); ?>lib/js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>
	<div id="container">
		<header>
			<div class="wrapper">
				<h1 id="logo"><a href="<?php echo getRoot(); ?>" title="<?php echo getTitle() . " Home"; ?>"><?php echo getTitle(); ?></a></h1>
				<nav>
					<div id="nav-links">
						<?php printPageLinks(); ?>
						<div class="clearfix"></div>
					</div>
				</nav>
				<div class="clearfix"></div>
			</div>
		</header>
		<div id="main" role="main">
			<div class="wrapper">