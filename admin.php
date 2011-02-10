<?php

if (isset($_GET['e']))
{
	$e = $_GET['e'];
	echo str_replace('"', '\"', $e);
}

?>

