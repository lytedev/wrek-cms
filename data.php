<?php

mysql_connect(cfg("dbhost"), cfg("dbuser"), cfg("dbpass"));
mysql_select_db(cfg("dbname"));

function query($query)
{
	return mysql_query($query);
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
	return str_replace('"', '\"', $e);
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
function getPost($id)
{
	$result = query("SELECT * FROM `posts` WHERE `id` = $id;");
	if ($result)
	{
		$post = Array();
		$post['id'] = result($result, 0, "id");
		$post['title'] = result($result, 0, "title");
		$post['content'] = result($result, 0, "content");
		$post['date'] = strtotime(result($result, 0, "date"));
		$post['description'] = result($result, 0, "description");
		$post['img'] = result($result, 0, "img");
		$post['visisble'] = result($result, 0, "visislbe");
		return $post;
	}
	else
	{
		return null;
	}
}

function getPosts($numToShow)
{
	$result = query("SELECT * FROM `posts` ORDER BY `date` DESC");
	$num = results($result);
	$posts = Array();
	for ($i = 0; $i < $num; $i++)
	{
		$id = result($result, $i, "id");
		$posts[$i] = getPost($id);
	}
	return $posts;
}

function addPost($title, $content, $description, $visible = true, $img = "noimage")
{
	$columns = array("title", "content", "description", "img", "author", "visible");
	$values = array($title, $content, $description, $img, $author, $visible);
	easyInsert("posts", $columns, $values);
}

?>