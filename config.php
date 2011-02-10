<?php

define("CFGTEXT", 0);

$CONFIG_ = Array();

function cfg($key)
{
	global $CONFIG_;
	return substr($CONFIG_[$key], 1);
}

function ecfg($key)
{
	echo cfg($key);
}

function cfgt($key)
{
	global $CONFIG_;
	return substr($CONFIG_[$key], 0, 1);
}

function addcfg($value, $key, $type = CFGTEXT)
{
	global $CONFIG_;
	$CONFIG_[$key] = $type . $value;
}

require_once("configvalues.php");

?>