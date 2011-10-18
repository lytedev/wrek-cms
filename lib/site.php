<?php /*
wrek2.0 
File: lib/site.php
Description: 
*/ 

function siteTitle() {
	return getSetting("site_title");
}

$_wrek_subtitle = "";

function getTitle() {
	global $_wrek_subtitle;
	return $_wrek_subtitle != "" ? $_wrek_subtitle . TITLE_SEPARATOR . siteTitle() : siteTitle();
}

function setSubtitle($q) {
	global $_wrek_subtitle;
	$_wrek_subtitle = $q;
}

function getRoot() {
	// return "";
	return getSetting("site_root");
}

function printNavigation()
{
	echo "<nav id=\"#navigation\">";
	printPageLinks();
	echo "</nav>";
}

function getPages() {
	$files = array();
	if ($handle = opendir(PAGES_DIRECTORY))
	{
		$p = array();
		$i = 0;
		while ($file = readdir($handle)) 
		{
			if ($file == "." || $file == ".." || $file == "index.php") { continue; }
			$post = new Post();
			$post->setFile(PAGES_DIRECTORY . $file);
			$post->load();
			$p[$i] = $post;
			$i++;
		}
		return $p;
	}
	return false;
}

function getPageBySafeURL($safeURL) {
	$files = array();
	if ($handle = opendir(PAGES_DIRECTORY))
	{
		$p = array();
		$i = 0;
		while ($file = readdir($handle)) 
		{
			if ($file == "." || $file == ".." || $file == "index.php") { continue; }
			$post = new Post();
			$post->setFile(PAGES_DIRECTORY . $file);
			$post->load();
			if (safeURL($post->title) == $safeURL)
			{
				return $post;
			}
			$p[$i] = $post;
			$i++;
		}
	}
	return false;	
}

function printPageLinks()
{
	$p = getPages();
	$i = 0;
	$num = count($p);
	foreach ($p as $post)
	{
		$post->showPageLink($i, $num);
		$i++;
	}
}

function getLinks() {
	$files = array();
	if ($handle = opendir(LINKS_DIRECTORY))
	{
		$p = array();
		$i = 0;
		while ($file = readdir($handle)) 
		{
			if ($file == "." || $file == ".." || $file == "index.php") { continue; }
			$post = new Post();
			$post->setFile(LINKS_DIRECTORY . $file);
			$post->load(true);
			$p[$i] = $post;
			$i++;
		}
		return $p;
	}
	return false;
}

function printLinks()
{
	$p = getLinks();
	foreach ($p as $post)
	{
		$post->showLink();
	}
}