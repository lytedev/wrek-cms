<?php 

session_start();
require_once("config.php");
require_once("data.php");

// Login/Registration Functions
$loggedIn = false;
$loggedInUser = null;
$loginError = "";

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
		addUser($username, $password);
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
	login($_SESSION['username'], $_SESSION['password']);
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

function echoPost($post, $entirePost = false)
{	
	if ($post && $post !== null)
	{
		if ($entirePost)
		{ ?>
		
			<h2><?php echo $post['title']; ?></h2>
			<p><?php echo $post['date']; ?></p>
			<?php echo $post['content']; ?>
		
		<?php }
		else
		{ ?>
		
			<h2><?php echo $post['title']; ?></h2>
			<?php echo $post['description']; ?>
			
		<?php }	
	}
	else	
	{
		if ($noLost === false)
		{
			userLost();
		}
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
		if ($noLost === false)
		{
			userLost();
		}
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
}

?>






































