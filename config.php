<?php

// Define config types here: 
define("CFGTEXT", 0);
define("CFGINT", 1);
define("CFGBOOL", 2);

$CONFIG_ = Array();

function cfg($key)
{
	global $CONFIG_;
	return $CONFIG_[$key];
}

function ecfg($key)
{
	echo cfg($key);
}

function cfgt($key)
{
	echo cfg($key . "type");
}

// $type is used to denote the type of the config value for displaying in a web form for editing the value on an admin page
function addcfg($key, $value, $type = CFGTEXT)
{
	global $CONFIG_;
	$CONFIG_[$key] = $value;
	$CONFIG_[$key . "type"] = $type;
}

require_once("configvalues.php");

?>