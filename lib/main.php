<?php /*
wrek2.0 
File: lib/main.php
Description: 
*/ 

DEFINE("COMMENT_DELIMITER", "#");
DEFINE("KEY_VAL_DELIMITER", ":");

DEFINE("CONTENT_DIRECTORY", "content/");
DEFINE("POSTS_DIRECTORY", CONTENT_DIRECTORY . "posts/");
DEFINE("PAGES_DIRECTORY", CONTENT_DIRECTORY . "pages/");
DEFINE("LINKS_DIRECTORY", CONTENT_DIRECTORY . "links/");
DEFINE("THEMES_DIRECTORY", CONTENT_DIRECTORY . "themes/");
DEFINE("BLOG_URL", CONTENT_DIRECTORY . "blog/");
DEFINE("TITLE_SEPARATOR", " - ");

DEFINE("SETTINGS_FILE", CONTENT_DIRECTORY . "settings.txt");

function loadFileContents($file) {
	$f = $file;
	$fh = fopen($f, 'r');
	$str = fread($fh, filesize($f));
	fclose($fh);
	return $str;
}

require_once("settings.php");

$_wrek_args = array(); {
$e = strlen(getSetting("site_root"));
$p = substr($_SERVER['REQUEST_URI'], $e);
$targs = explode('/', $p);
for ($i = 0; $i < count($targs); $i++)
{ $_wrek_args[$i] = $targs[$i]; } }

function getArg($i) {
	global $_wrek_args;
	return isset($_wrek_args[$i]) ? $_wrek_args[$i] : false;
}

function currentThemeDirectory() {
	return THEMES_DIRECTORY . getSetting("current_theme") . "/";
}

function themeDirectory() {
	return getRoot() . THEMES_DIRECTORY . getSetting("current_theme") . "/";
}

require_once("post.php");
require_once("site.php");

function getThemeFile($i) {
	return file_exists(currentThemeDirectory() . $i) ? currentThemeDirectory() . $i : false;
}

function themeFile($i) {
	return themeDirectory() . $i;
}

function getHeader() {
	if (($p = currentPage()) != false) {
		setSubtitle($p->title);
	} else if (($p = currentPost()) != false) {
		setSubtitle($p->title);		
	}

	if (file_exists($f = getThemeFile("header.php"))) {
		require($f);
	} else { // Default Header 
	?><!doctype html>
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
	<?php echo ($f = themeFile("favicon.ico")) != false ? "<link rel=\"shortcut icon\" href=\"" . $f . "\" />" : ""; ?>
	<script src="<?php echo getRoot(); ?>lib/js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>
	<div id="container">
		<header>
			<h1 id="logo"><a href="<?php echo getRoot(); ?>" title="<?php echo siteTitle() . " Home"; ?>"><?php echo siteTitle(); ?></a></h1>
			<?php printNavigation(); ?>
		</header>
		<div id="main" role="main">
	<?php }
}

function contentType() {
if (getArg(0) == "blog") {
	return getArg(1) != false ? "post" : "blog";
} else if (strlen(getArg(0)) > 0) {
	return "page";
} else if (getArg(0) == false) { 
	return "index";
} }

$_wrek_current_page = 1;

function getCurrentPage() {
	global $_wrek_current_page;
	return $_wrek_current_page;
}

function setCurrentPage($i) {
	global $_wrek_current_page;
	$_wrek_current_page = $i;
}

if (contentType() == "blog" && strtolower(trim(getArg(1))) == "page") {
	setCurrentPage(getArg(2));
}

function currentPost() {
	if (contentType() == "post") {
		return getArg(1) != false ? getPostBySafeURL(getArg(1)) : false; 
	}
	return false;
}

function currentPage() {
	if (contentType() == "page") {
		return getArg(0) != false ? getPageBySafeURL(getArg(0)) : false; 
	}
	return false;	
}

function getContent() { 
if (contentType() == "post") {
	if (currentPost() == false) { echo "Could not find specified post!"; return false; }
	currentPost()->show(); 
} else if (contentType() == "page") {
	if (currentPost() == false) { echo "Could not find specified page!"; return false; }
	currentPage()->showPage();	
} else { // Index
	printLatestPosts();
} }

function getFooter() { 
	$f = currentThemeDirectory() . "footer.php";
	if (file_exists($f)) {
		require($f);
	} else { // Default Footer
	?>
		</div>
	</div>
	<footer>
		<div id="copyright">
			Copyright &copy <?php echo getTitle(); ?> <?php echo date('Y'); ?>
		</div>
		<nav id="footer-nav">
		
		<?php printLinks(); ?>
		
		</nav>
	</footer>
	<script defer src="lib/js/plugins.js"></script>
	<!-- Link your scripts here! -->
	<?php if (file_exists(currentThemeDirectory() . "scripts.php")) { require(currentThemeDiretory() . "scripts.php"); } ?>
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>
<?php }
}