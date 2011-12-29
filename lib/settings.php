<?php /*
wrek2.0 
File: lib/settings.php
Description: 
*/ 

$_wrek_settings = array();

function parseSettingLine($line) {
	$nc = explode(COMMENT_DELIMITER, $line);
	$kv = explode(KEY_VAL_DELIMITER, $nc[0]);
	if (count($kv) < 2) {
		return false;
	} else if (count($kv) == 2) {
		return array(trim($kv[0]), trim($kv[1]));
	} else {
		$str = $kv[1];
		$count = count($kv);
		for ($i = 2; $i < $count; $i++)
		{
			if ($i != $count) { $str .= ":"; }
			$str .= $kv[$i];
		}
		return array(trim($kv[0]), trim($str));
	}
}

function safeURL($str) {
	return str_replace(" ", "-", (trim(strtolower(ereg_replace("[^A-Za-z0-9\. ]", "", $str)))));
}

function getSettings() {
	global $_wrek_settings;
	return $_wrek_settings;
}

function getSetting($i) {
	global $_wrek_settings;
	return isset($_wrek_settings[$i]) ? $_wrek_settings[$i] : false;
}

function setSetting($i, $val) {
	global $_wrek_settings;
	$_wrek_settings[$i] = $val;
}

function loadSettings($file = SETTINGS_FILE) {
	$str = explode("\n", loadFileContents($file));
	$num = count($str);
	for ($i = 0; $i < $num; $i++)
	{
		$p = parseSettingLine($str[$i]);
		setSetting($p[0], $p[1]);
	}
}

function saveSettings($file = SETTINGS_FILE) {
	foreach (getSettings() as $key => $value) {
		
	}
}

loadSettings();