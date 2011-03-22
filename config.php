<?php

<<<<<<< HEAD
// Define config types here: 
define("CFGTEXT", 0);
define("CFGINT", 1);
define("CFGBOOL", 2);
=======
define("CFGTEXT", 0);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f

$CONFIG_ = Array();

function cfg($key)
{
	global $CONFIG_;
<<<<<<< HEAD
	return $CONFIG_[$key];
=======
	return substr($CONFIG_[$key], 1);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}

function ecfg($key)
{
	echo cfg($key);
}

function cfgt($key)
{
<<<<<<< HEAD
	echo cfg($key . "type");
}

// $type is used to denote the type of the config value for displaying in a web form for editing the value on an admin page
function addcfg($key, $value, $type = CFGTEXT)
{
	global $CONFIG_;
	$CONFIG_[$key] = $value;
	$CONFIG_[$key . "type"] = $type;
=======
	global $CONFIG_;
	return substr($CONFIG_[$key], 0, 1);
}

function addcfg($value, $key, $type = CFGTEXT)
{
	global $CONFIG_;
	$CONFIG_[$key] = $type . $value;
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
}

require_once("configvalues.php");

?>