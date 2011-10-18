<?php /*
wrek2.0 
File: lib/post.php
Description: 
*/ 

class Post {
public $title;
public $content;
public $description;
public $link_id;
public $date; 
public $author;
public $image;
public $show;
public $file; 
public $userdata;

	// $file
	function setFile($file) {
		$this->file = $file;
	}
	
	function getFile() {
		return $this->file;
	}
	
	function getFiletype() {
		return trim(strtolower(substr($this->getFile(), -3)));
	}
	
	function getFilename($suffix = false) {
		$q = explode("/", $this->file);
		$n = count($q) - 1;
		return $suffix ? $q[$n] : substr($q[$n], 0, -4);
	}
	
	// $userdata
	function setUserdata($i, $v) {
		$this->userdata[$i] = $v;
	}
	
	function getUserdata($i) {
		return isset($this->userdata[strtolower($i)]) ? $this->userdata[strtolower($i)] : false;
	}
	
	function getPermalink($isPost = true) {	
		return $isPost ? getRoot() . "post/" . $this->link_id : getRoot() . $this->link_id;
	}
	
	// Functions
	function load($link = false) {
		$this->userdata = array();
		if ($this->getFiletype() == "txt")
		{
			$str = loadFileContents($this->file);
			$estr = explode("\n", $str);
			$num = count($estr);
			$i = 0;
			$str = "";
			$flag = true;
			for (; $i < $num; $i++)
			{
				$p = parseSettingLine($estr[$i]);
				
				if ($p && $flag && trim($estr[$i]) != "") {
					$this->setUserdata(strtolower($p[0]), $p[1]);
				} else {
					$flag = false;
					if (!$link) { $str .= "<p>"; }
					$str .= $estr[$i];
					if (!$link) { $str .= "</p>"; }
				}
			}
			
			$this->title = $this->getUserdata("title") != false ? $this->getUserdata("title") : $this->getFilename();
			$this->content = $this->getUserdata("content") != false ? getUserdata("content") : "EMPTY POST"; 
			$this->description = $this->getUserdata("description") != false ? $this->getUserdata("description") : "";
			$this->link_id = $this->getUserdata("link id") != false ? $this->getUserdata("link id") : safeURL($this->title);
			$this->date = $this->getUserdata("date") != false ? date(getSetting("date_time_fmt", strtotime(getUserdata("date")))) : filectime($this->file);
			$this->author = $this->getUserdata("author") != false ? $this->getUserdata("author") : "admin";
			$this->image = $this->getUserdata("image") != false ? $this->getUserdata("image") : "";
			$this->show = $this->getUserdata("show") != false ? $this->getUserdata("show") : true;
			
			$this->content = $str;
		}
		else if ($this->getFiletype() == "php")
		{			
			$this->title = $this->getFilename();
			$this->content = "EMPTY POST"; 
			$this->description = "";
			$this->link_id = "DUMMY";
			$this->date = filectime($this->file);
			$this->author = "admin";
			$this->image = "";
			$this->show = true;
			include $this->getFile();
			
			if ($this->link_id == "DUMMY") {
				$this->link_id = safeURL($this->title);
			}
		}
		else if ($this->getFiletype() == "html")
		{
			$this->title = $this->getFilename();
			$this->content = "HTMLPOST"; 
			$this->description = "HTMLPOST.d";
			$this->link_id = safeURL($this->title);
			$this->date = filectime($this->file);
			$this->author = "admin";
			$this->image = "";
			$this->show = true;
			// echo "I AM HERE"; TODO: HTML Pages/Posts/Stuff
		}
		$this->setUserdata("wrek_full_post", false);
	}
	
	function show() {
		if ($this->getFiletype() == "html") {
			include($this->file);
			return;
		} else if (!$this->show) { return; }
		$this->setUserdata("wrek_full_post", true);
		if ($f = getThemeFile("post.php")) { 
			require($f); 
		} else { ?> 
			<div class="post">
			<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
			<h2 class="post-title"><?php echo $this->title; ?></h2>
			<div class="post-date"><?php echo date(getSetting("date_time_fmt"), $this->date); ?>
			<div class="post-content"><?php echo $this->content; ?></div>
		<?php }
	}
	
	function showPage() {
		if ($this->getFiletype() == "html") {
			include($this->file);
			return;
		} else if (!$this->show) { return; }
		$this->setUserdata("wrek_full_post", true);
		if ($f = getThemeFile("page.php")) { 
			require($f); 
		} else { ?> 
			<div class="page">
			<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
			<h2 class="post-title"><?php echo $this->title; ?></h2>
			<div class="post-content"><?php echo $this->content; ?></div>
			</div>
		<?php }	
	}
	
	function showSmall() {
		if (!$this->show) { return; }
		else if ($this->getFiletype() == "html") {
			include($this->file);
			return;
		}
		$this->setUserdata("wrek_full_post", true);
		if ($f = getThemeFile("smallpost.php")) { 
			require($f); 
		} else { ?> 
			<div class="small-post">
			<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
			<h2 class="post-title"><a href="<?php echo getRoot() . "post/" . $this->link_id; ?>"><?php echo $this->title; ?></a></h2>
			<div class="post-date"><?php echo $this->timeAgo();/*date(getSetting("date_time_fmt"), $this->date);*/ ?>
			<div class="post-description"><?php echo $this->description == "" ? $this->content : $this->description; ?></div>
		<?php }	
	}
	
	function showPageLink($i = 1, $num = 2) {
		if ($this->getFiletype() == "html") {
			include($this->file);
			return;
		} else if (!$this->show) { return; } 
		if ($f = getThemeFile("pagelink.php")) { 
			require($f); 
		} else {
			$q = ($i == 0 || $i == ($num - 1));
			$c = $q ? "class=\"" : "";
			if ($q && $i == 0) { $c .= "first-page-link"; } 
			if ($i == 0 && $i == ($num - 1)) { $c .= " "; } 
			if ($q && $i == ($num - 1)) { $c .= "last-page-link"; } 
			if ($q) { $c .= "\""; }
			echo "<a " . $c . "title=\"" . $this->description . "\" href=\"" . $this->getPermalink(false) . "\">" . $this->title . "</a>";
		}
	}
	
	function showLink() {
		if ($this->getFiletype() == "html") {
			include($this->file); // TODO: Fix - ATM Broken
			return;
		} else if (!$this->show) { return; } 
		if ($f = getThemeFile("link.php")) { 
			require($f); 
		} else {
			echo "<a target=\"_blank\" title=\"" . $this->description . "\" href=\"" . $this->content . "\">" . $this->title . "</a>";
		}
	}
	
	function timeAgo() {
		$periods = array("second", "minute", "hour", "day", "week", "month", "year");
		$lengths = array("60","60","24","7","4.35","12");

		$now = time();
		$time = $this->date;

		$difference = $now - $time;
		$tense = "ago";

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1) {
			$periods[$j].= "s";
		}

		return "$difference $periods[$j] $tense";
	}
	
	function isFull()
	{
		return $this->getUserdata("wrek_full_post");
	}
	
} // End Post class

// Post-centered global functions
function loadPostFromFile($file) {
	$post = new Post();
	$post->setFile($file);
	$post->load();
	return $post;
}

function getPostBySafeURL($safeURL) {
	$files = array();
	if ($handle = opendir(POSTS_DIRECTORY))
	{
		$p = array();
		$i = 0;
		while ($file = readdir($handle)) 
		{
			if ($file == "." || $file == ".." || $file == "index.php") { continue; }
			$post = new Post();
			$post->setFile(POSTS_DIRECTORY . $file);
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

function getLatestPosts($offset = 0, $count = 10) {
	$files = array();
	if ($handle = opendir(POSTS_DIRECTORY))
	{
		while ($file = readdir($handle)) 
		{
			if ($file != "." && $file != ".." && $file != "index.php") 
			{
				$id = filectime(POSTS_DIRECTORY . $file);
				while (isset($files[$id]))
				{
					$id++;
				}
				$files[$id] = $file;
			}
		}
		closedir($handle);
		ksort($files);
		$reallyLastModified = end($files);
		$f2 = array();
		$i = 0;
		$j = 0;
		foreach ($files as $file) 
		{
			$p = loadPostFromFile(POSTS_DIRECTORY . $file);
			if ($i >= $offset && $p->show)
			{
				$i++;
				$f2[$j++] = $p;
				$p->setUserdata("local_id", $j);
			}
			else if ($i >= offset)
			{
				$i++;
			}
		}
		if ($offset > 0) {
			$f2[0]->setUserdata("_wrek_less_posts", true);
		}
		if ($j >= $count)
		{
			$f2[0]->setUserdata("_wrek_more_posts", true);
			return $f2;
		}
		return $f2;
	}
	return false;
}

function printLatestPosts($o = 0)
{
	$p = getLatestPosts($o, getSetting("posts_per_page"));
	for ($i = 0; $i < min(count($p), getSetting("posts_per_page")); $i++)
	{
		$p[$i]->showSmall();
	}
	$more = $p[0]->getUserdata("_wrek_more_posts") != false;
	$less = $p[0]->getUserdata("_wrek_less_posts") != false;
	if ($more || $less)
	{
		echo "<p><small>";
	}
	if ($less == true)
	{
		echo getCurrentPage() - 1 == 1 ? "<a href=\"" . getRoot() . "blog\" title=\"\"> &laquo; Earlier Posts </a> " : "<a href=\"" . getRoot() . "blog/page/" . (getCurrentPage() - 1) . "\" title=\"\"> &laquo; Earlier Posts </a> ";
	}
	if ($more == true)
	{
		echo "<a href=\"" . getRoot() . "blog/page/" . (getCurrentPage() + 1) . "\" title=\"\"> Later Posts &raquo; </a> ";
	}
	if ($more || $less)
	{
		echo "</small></p>";
	}
}