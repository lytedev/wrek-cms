<?php 

<<<<<<< HEAD
// Recommendation: Do not edit! 

session_start();
require_once("config.php");

if (cfg("configured") === false)
{
	echo "If the install fails, open \"configvalues.php\" and (re)configure, then <a href=\"" . cfg("root") . "/\">click here</a>!<br />";
}

require_once("data.php");

if ($dataSetup === true)
{
	
}
else
{
	exit(0);
}

=======
session_start();
require_once("config.php");
require_once("data.php");

>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
// Login/Registration Functions
$loggedIn = false;
$loggedInUser = null;
$loginError = "";

<<<<<<< HEAD
if (isset($_GET['logout']))
{
	logout();
}

function isLoggedIn()
{
	global $loggedIn;
	return $loggedIn;
}

function logout()
{
	unset($_POST['username']);
	unset($_POST['password']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_GET['username']);
	unset($_GET['password']);
	session_destroy();
	echo '<script>window.location="' . cfg("root") . '/"</script>';
}

function login($username, $password, $bySession = false)
{
	global $loggedInUser, $loggedIn, $loginError;
	$password = $password;
	if (cfg("passwordismd5"))
	{
		$password = md5($password);
	}
	// echo $username . "<br />" . cfg("username") . "<br />" . $password . "<br />" . cfg("password");
	if ($username == cfg("username") && $password == cfg("password"))
	{
		$user = Array(); 
		$user['username'] = $username;
		$loggedInUser = $user;
		$loggedIn = true;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		if (!$bySession)
		{
			echo '<script>window.location="' . cfg("root") . '/admin.php"</script>';
		}
		return;
	}
	else if ($username != cfg("username"))
	{
		$loginError = "Invalid Username";
	}
	else if ($username == cfg("username") && $password != cfg("password"))
	{
		$loginError = "Invalid Password";
=======
function isLoggedIn()
{
	return $loggedIn;
}

function login($username, $password)
{
	$password = md5($password);
	$username = safe($username);
	$user = getUser($username, true);
	if ($user === null)
	{
		$loginError = "Invalid Username";
	}
	else 
	{
		if ($password == $user['password'])
		{
			$loggedInUser = $user;
			return;
		}
		else
		{
			$loginError = "Invalid Password";
		}
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
	}
	session_destroy();
}

function register($username, $password)
{
	$password = md5($password);
	$username = safe($username);
	$user = getUser($username, true);
	if ($user === null)
	{
<<<<<<< HEAD
		// addUser($username, $password);
=======
		addUser($username, $password);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
		return;
	}
	else
	{
		$loginError = "Username Taken";
	}
	session_destroy();
}

if (isset($_SESSION['username']) && isset($_SESSION['password']))
{
<<<<<<< HEAD
	login($_SESSION['username'], $_SESSION['password'], true);
	unset($_POST['username']);
	unset($_POST['password']);
=======
	login($_SESSION['username'], $_SESSION['password']);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}
else if (isset($_POST['username']) && isset($_POST['password']))
{
	login($_POST['username'], $_POST['password']);
}
else if (isset($_POST['reg-username']) && isset($_POST['reg-password']))
{
	register($_POST['reg-username'], $_POST['reg-password']);
}
else
{
	session_destroy();
}

// Post Functions
$canLose = true;

<<<<<<< HEAD
function echoPost(&$post, $entirePost = false)
{	
	if ($post && $post !== null && count($post) > 1)
	{	
		$post['comments'] = false;	
		if ($entirePost === true)	
		{ $post['comments'] = true;
		?>
			<a href="blog.php?p=<?php echo $post['id']; ?>">
				<h3 class="post-title">
					<?php echo $post['title']; ?>
					<small class="right"><?php echo $post['date']; ?></small>
				</h3>
			</a>
			<span class="clearfix"></span>
			<br />
			<?php echo $post['content']; ?>
		
		<?php }
		else if ($entirePost === false)
		{ ?>
		
			<a href="blog.php?p=<?php echo $post['id']; ?>">
				<h3 class="post-title">
					<?php echo $post['title']; ?>
					<small class="right"><?php echo $post['date']; ?></small>
				</h3>
				<div class="desc">
					<?php echo $post['description']; ?>
				</div>
			</a>
			
		<?php }	else if ($entirePost == 2) { ?>
		
			<a href="admin.php?a=edit&e=<?php echo $post['id']; ?>">
				<h3 class="post-title">
					<?php echo $post['title']; ?>
					<small><?php if ($post['visible'] == 1) { echo "Post"; } else { echo "Draft"; } ?></small>
					<small class="right"><?php echo $post['date']; ?></small>
				</h3>
				<div class="desc">
					<?php echo $post['description']; ?>
				</div>
			</a>
		
		<?php }
	}
	else	
	{
		return;
	}
}

function echoPosts($numToShow, $entirePost = false, $offset = 0, $more = false, $visible = 1)
{
	if ($offset < 0)
	{
		$offset = 0;
	}
	$datefmt = cfg("sdtfmt");
	if ($entirePost)
	{
		$datefmt = cfg("ldtfmt");
	}
	$posts = getPosts($numToShow, $datefmt, $offset, $visible);
	if (count($posts[0]) < 2)
	{
		echo "No posts found!";
	}
	$navd = false;
	if ($posts[0]['more'] && $more)
	{
		echo "<a href=\"" . cfg("root") . "/blog.php?o=" . ($offset + cfg("maxposts")) . "\">Older Posts</a>";
		$navd = true;
	}
	if ($offset > 0)
	{	
		$noffset = $offset - cfg("maxposts");
		if ($noffset < 0)
		{
			$noffset = 0;
		}
		if ($navd)
		{
			echo " | ";
		}
		echo "<a href=\"" . cfg("root") . "/blog.php?o=" . ($noffset) . "\">Newer Posts</a>";
		$navd = true;
	}
	if ($navd)
	{
		echo "<br /><br />";	
	}
	for ($i = 0; $i < count($posts); $i++)
	{
		echoPost($posts[$i], $entirePost, $noLost);
		if ($i != count($posts) - 1)
		{
			echo "<br />\n";
		}
	}
	$navd = false;
	if ($posts[0]['more'] && $more)
	{
		echo "<br /><a href=\"" . cfg("root") . "/blog.php?o=" . ($offset + cfg("maxposts")) . "\">Older Posts</a>";
		$navd = true;
	}
	if ($offset > 0)
	{	
		$noffset = $offset - cfg("maxposts");
		if ($noffset < 0)
		{
			$noffset = 0;
		}
		if (!$navd)
		{
			echo "<br />";
		}
		else
		{
			echo " | ";
		}
		echo "<a href=\"" . cfg("root") . "/blog.php?o=" . ($noffset) . "\">Newer Posts</a>";
		$navd = true;
	}
}

function getTwitter($username)
{
if ($username == "") { return; }
	?><script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 6000,
  width: 300,
  height: 250,
  theme: {
    shell: {
      background: '#222222',
      color: '#ffffff'
    },
    tweets: {
      background: '#222222',
      color: '#cccccc',
      links: '#ff9900'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo $username; ?>').start();
</script><?php
=======
function echoPost($post, $entirePost = false)
{	
	if ($post && $post !== null)
	{
		if ($entirePost)
		{ ?>
		
			<h2 class="post-title"><?php echo $post['title']; ?></h2>
			<p><?php echo $post['date']; ?></p>
			<?php echo $post['content']; ?>
		
		<?php }
		else
		{ ?>
		
			<h3 class="post-title"><?php echo $post['title']; ?></h3>
			<?php echo $post['description']; ?>
			
		<?php }	
	}
	else	
	{
		userLost();
	}
}

function echoPosts($numToShow, $entirePost = false)
{
	$posts = getPosts($numToShow);
	for ($i = 0; $i < count($posts); $i++)
	{
		echoPost($posts[$i], $entirePost, $noLost);
	}
	if (count($posts) < 1)
	{
		userLost();
	}
}

function userLost()
{
	global $canLose;
	if ($canLose)
	{
		echo "<h2>You're Lost</h2>";
		echo "<p>I'm afraid there's nothing here... strange.</p>";
		echo "<p>Perhaps you've performed some sort of invalid search? ";
		echo "Maybe the posts you're trying to view were deleted? ";
		echo "It was probably just one post though. Maybe I should change that grammar.</p>";
		echo "<p>Well, I'm sorry you've lost my post... wait, you lost my post? Go find it!</p>";
	}
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}

?>






































