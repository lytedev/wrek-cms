<?php

<<<<<<< HEAD
$dataSetup = true;
$connection = 0;
$database = 0;
if (cfg("configured") === false)
{
	try	
	{
		$dataSetup = false;
		if (cfg("configured") === false)
		{ echo "Connecting to MySQL Server... "; }
		$connection = @mysql_connect(cfg("dbhost"), cfg("dbuser"), cfg("dbpass")) or die("<b style=\"color:red\">FAILURE</b> - Could not connect to MySQL server. Check config values!");
		if (!$connection) 
		{ die("<b style=\"color:red\">FAILURE</b> - Could not connect to MySQL server. Check config values!"); }
		{ echo "Complete!<br />"; }
		if (cfg("configured") === false)
		{ echo "Selecting Database... "; }
		$database = @mysql_select_db(cfg("dbname"));
		if (!$database) 
		{ die("<b style=\"color:red\">FAILURE</b> - Could not find Database. Check config values!"); }
		echo "Complete!<br />";
		echo "Dropping table `posts`... ";
		query("DROP TABLE IF EXISTS `posts`");
		echo "Complete!<br />";
		echo "Creating table `posts`... ";
		query("CREATE TABLE `posts` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`title` TEXT NULL,
	`content` TEXT NULL,
	`date` DATETIME NULL DEFAULT NULL,
	`description` TEXT NULL,
	`img` TEXT NULL,
	`visible` INT(1) UNSIGNED NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
ROW_FORMAT=DEFAULT
AUTO_INCREMENT=17");
		echo "Complete!<br />";
		echo "<b style=\"color:#08f\">SUCCESS</b> - Installation Complete! Set 'configured' to 'true' or comment that line in \"configvalues.php\" and visit <a href=\"admin.php\">the admin page</a>.
		If you have already seen this message, be sure to follow the above instructions!";
	}
	catch (Exception $e)
	{
		
	}
}
else if (cfg("configured") === false && !isset($_GET['config']))
{
	die;
}
else
{
	$connection = @mysql_connect(cfg("dbhost"), cfg("dbuser"), cfg("dbpass"));
	$database = @mysql_select_db(cfg("dbname"));
}

function query($query)
{
	return mysql_query($query) or die("Query Failed: " . $query);
=======
mysql_connect(cfg("dbhost"), cfg("dbuser"), cfg("dbpass"));
mysql_select_db(cfg("dbname"));

function query($query)
{
	return mysql_query($query);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}

function result($results, $index, $column)
{
	if (is_bool($results))
	{
		echo "<p>data.php->result(r,i,c): Invalid MySQL Resource '" . $results . "'</p>\n";
		return 0;
	}
	else
	{
		return mysql_result($results, $index, $column);
	}
}

<<<<<<< HEAD
function easyInsert($table, $columns, $values)
{
	$colString = "";
	$valString = "";
	$num = min(count($columns), count($values));
	for ($i = 0; $i < $num; $i++)
	{
		$colString .= $columns[$i];
		if ($i < $num - 1)
		{
			$colString .= ", ";
		}
		$valString .= "'" . $values[$i] . "'"; 
		if ($i < $num - 1)
		{
			$valString .= ", ";
		}
	}
	$query = "INSERT INTO `$table` (" . $colString . ") VALUES (" . $valString . ");";
	query($query);
}

=======
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
function results($results)
{
	if (is_bool($results))
	{
		// echo "<p>data.php->results(r): Invalid MySQL Resource " . $results . "<p>\n";
		return 0;
	}
	else
	{
		return mysql_numrows($results);
	}
}

function safe($str)
{
    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc() === 1)
	{
        $str = stripslashes(htmlentities(trim($str)));
    }
	else 
	{
        $str = htmlentities(trim($str));
    }
    return addcslashes(mysql_real_escape_string($str), "%_");
}

function mostlySafe($str)
{
<<<<<<< HEAD
	return str_replace("'", "\'", str_replace('"', '\"', $str));
=======
	return str_replace('"', '\"', $e);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}

// User Data Functions
function getUser($user, $getPassword = false)
{
	if (gettype($user) == "string")
	{
		$user = query("SELECT `id` FROM `users` WHERE `username` = \"$user\";");
	}
	$result = query("SELECT * FROM `users` WHERE `id` = \"$user\";");
	if ($result)
	{
		$user = Array();
		if ($getPassword === true)
		{
			$user['password'] = $result($result, 0, "password");
		}
		$user['username'] = $result($result, 0, "password");
		return $user;
	}
	else 
	{
		return null;
	}
}

function addUser($user, $password)
{
	$columns = array("username", "password");
	$values = array($user, $password);
	easyInsert("users", $columns, $values);
}

// Blog Data Functions
<<<<<<< HEAD
function getPost($id, $datefmt)
=======
function getPost($id)
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
{
	$result = query("SELECT * FROM `posts` WHERE `id` = $id;");
	if (results($result) > 0)
	{
		$post = Array();
		$post['id'] = result($result, 0, "id");
		$post['title'] = result($result, 0, "title");
		$post['content'] = result($result, 0, "content");
<<<<<<< HEAD
		$post['date'] = date($datefmt, strtotime(result($result, 0, "date")));
=======
		$post['date'] = strtotime(result($result, 0, "date"));
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
		$post['description'] = result($result, 0, "description");
		$post['img'] = result($result, 0, "img");
		$post['visible'] = result($result, 0, "visible");
		return $post;
	}
	else
	{
		return null;
	}
}

<<<<<<< HEAD
function getPosts($numToShow, $datefmt, $offset, $visible = 1)
{
	$visibleString = "WHERE `visible` = $visible ";
	if ($visible == 2)
	{
		$visibleString = "";
	}
	$result = query("SELECT * FROM `posts` " . $visibleString . "ORDER BY `date` DESC LIMIT " . $numToShow . " OFFSET " . $offset . ";");
=======
function getPosts($numToShow)
{
	$result = query("SELECT * FROM `posts` ORDER BY `date` DESC");
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
	$num = results($result);
	$posts = Array();
	for ($i = 0; $i < $num; $i++)
	{
		$id = result($result, $i, "id");
<<<<<<< HEAD
		$posts[$i] = getPost($id, $datefmt);
	}
	$posts[0]['more'] = false;
	$num2 = results(query("SELECT * FROM `posts` " . $visibleString . "ORDER BY `date` DESC LIMIT " . ($numToShow + 1) . " OFFSET " . $offset . ";"));
	if ($num2 > $num)
	{
		$posts[0]['more'] = true;
=======
		$posts[$i] = getPost($id);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
	}
	return $posts;
}

<<<<<<< HEAD
function editPost($id, $title, $content, $description, $visible = true, $img = "noimage")
{
	query("DELETE FROM `posts` WHERE `id` = " . $id . " LIMIT 1;");
	$date = date("Y-m-d H:i:s");
	$columns = array("id", "title", "content", "description", "date", "img", "author", "visible");
	$values = array($id, $title, $content, $description, $date, $img, $author, $visible);
	easyInsert("posts", $columns, $values);
}

function addPost($title, $content, $description, $visible = true, $img = "noimage")
{
	$date = date("Y-m-d H:i:s");
	$columns = array("title", "content", "description", "date", "img", "visible");
	$values = array($title, $content, $description, $date, $img, $visible);
=======
function addPost($title, $content, $description, $visible = true, $img = "noimage")
{
	$columns = array("title", "content", "description", "img", "author", "visible");
	$values = array($title, $content, $description, $img, $author, $visible);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
	easyInsert("posts", $columns, $values);
}

?>