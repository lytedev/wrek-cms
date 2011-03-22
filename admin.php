<?php require_once("header.php"); 

// Recommendation: Do not edit!

?>

<h2><a href="admin.php">.administration</a>
<?php if (isLoggedIn()){?>
<small class="right"><a href="<?php ecfg("root"); ?>/admin.php?logout">Logout</a> (Logged in as <?php echo $loggedInUser['username']; ?>)</small><?php } ?>
</h2>
<?php 

$status = "";
$title = "Title";
$content = safe("<p class=\"top\"></p>") . "\r\n" . safe("<p></p>");
$description = "A post.";

if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['description']) && isset($_GET['e']))
{
	$title = $_POST['title'];
	$content = $_POST['content'];
	$description = $_POST['description'];
	$post = true;
	$status = "Posted!";
	if (isset($_POST['save']))
	{
		$post = false;
		$status = "Saved!";
	}
	editPost($_GET['e'], mostlySafe($title), mostlySafe($content), mostlySafe($description), $post);
}

if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['description']))
{
	$title = $_POST['title'];
	$content = $_POST['content'];
	$description = $_POST['description'];
	$post = true;
	$status = "Posted!";
	if (isset($_POST['save']))
	{
		$post = false;
		$status = "Saved!";
	}
	addPost(mostlySafe($title), mostlySafe($content), mostlySafe($description), $post);
}

function echoControlPanel()
{ ?>

<h3>Control Panel
<?php echo " <small class=\"right\">$loginError</small>"; ?>
</h3>
<div class="desc">
	<a href="<?php ecfg("root"); ?>/admin.php?a=post">New Post</a>
	| <a href="<?php ecfg("root"); ?>/admin.php?a=edit">Edit Posts</a>
	| <a href="<?php ecfg("root"); ?>/admin.php?a=delete">Delete Posts</a>
</div>

<?php }

if (isLoggedIn())
{ if (isset($_GET['a'])) { 
$action = $_GET['a'];
if ($action == "post")
{
?>

<h3>New Post
<?php echo ' <small>' . $status . '</small> <small class="right"><a href="' . cfg("root") . "/admin.php" . '">Back to Control Panel</a></small>'; ?>
</h3>
<div class="desc">
	<form method="post" action="">
		<input type="text" name="title" class="text-input" value="<?php echo $title; ?>" /> Title<br />
		Content: <br />
		<textarea class="text-input" name="content"><?php echo $content; ?></textarea><br />
		Description: <br />
		<textarea class="text-input" name="description"><?php echo $description; ?></textarea><br />
		<input type="submit" name="save" class="button" value="Save" />
		<input type="submit" name="post" class="button" value="Post" />
	</form>
</div>

<?php } else if ($action == "edit") 
{
	if (isset($_GET['e']))
	{ $post = getPost($_GET['e'], "");
	?>
	
		<h3>Edit Post
		<?php echo ' <small>' . $status . '</small> <small class="right"><a href="' . cfg("root") . "/admin.php" . '">Back to Control Panel</a></small>'; ?>
		</h3>
		<div class="desc">
			<form method="post" action="admin.php?a=edit&e=<?php echo $post['id']; ?>">
				<input type="text" name="title" class="text-input" value="<?php echo $post['title']; ?>" /> Title<br />
				Content: <br />
				<textarea class="text-input" name="content"><?php echo str_replace("\\r\\n", "\r\n", safe($post['content'])); ?></textarea><br />
				Description: <br />
				<textarea class="text-input" name="description"><?php echo str_replace("\\r\\n", "\r\n", safe($post['description'])); ?></textarea><br />
				<input type="submit" name="save" class="button" value="Save" />
				<input type="submit" name="post" class="button" value="Post" />
			</form>
		</div>
	
	<?php }
	else 
	{
		$offset = 0;
		if (isset($_GET['o']))
		{
			$offset = $_GET['o'];
		}
		// function echoPosts($numToShow, $entirePost = false, $offset = 0, $more = false)
		echoPosts(cfg("maxadminposts"), 2, $offset, true, 2); 
	} ?>

<?php } else if ($action == "delete") 
{
	if (isset($_GET['confirmed']) && isset($_GET['e']))
	{ $post = getPost($_GET['confirmed'], "");
	?>
	
		<?php deletePost(safe($_GET['e'])); ?>
		<h3>Delete Post
		<?php echo ' <small>' . $status . '</small> <small class="right"><a href="' . cfg("root") . "/admin.php" . '">Back to Control Panel</a></small>'; ?>
		</h3>
		<div class="desc">
			<p class="top">Post <?php echo $_GET['e']; ?> deleted.</p>
			<p><a href="<?php ecfg("root"); ?>/admin.php">Back to Control Panel</a></p>
		</div>
	
	<?php }
	else if ($_GET['e'])
	{ ?>
		<h3>Delete Post
		<?php echo ' <small>' . $status . '</small> <small class="right"><a href="' . cfg("root") . "/admin.php" . '">Back to Control Panel</a></small>'; ?>
		</h3>
		<div class="desc">
			<p class="top">Are you sure you want to delete post <?php echo $_GET['e']; ?>?</p>
			<p><a href="<?php ecfg("root"); ?>/admin.php">No</a> | <a href="<?php ecfg("root"); ?>/admin.php?a=delete&e=<?php echo $_GET['e']; ?>&confirmed">Yes</a></p>
		</div>
	<?php }
	else 
	{
		$offset = 0;
		if (isset($_GET['o']))
		{
			$offset = $_GET['o'];
		}
		// function echoPosts($numToShow, $entirePost = false, $offset = 0, $more = false)
		echoPosts(cfg("maxadminposts"), 2, $offset, true, 2); 
	}
}
else { echoControlPanel(); } } else { ?> 

<?php echoControlPanel(); ?>

<?php } } else { ?>

<h3>Login
<?php echo " <small class=\"right\">$loginError</small>"; ?>
</h3>
<div class="desc">
	<form method="post" action="<?php ecfg("root"); ?>/admin.php">
		<input type="text" name="username" class="text-input" /> Username<br />
		<input type="password" name="password" class="text-input" /> Password<br />
		<input type="submit" class="button" />
	</form>
</div>

<?php } require_once("footer.php"); ?>
