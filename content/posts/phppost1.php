<?php // Comments (// [stuff]) are ignored and great for leaving notes to yourself or other editors/admins in your content. 
// Open the php tags.

// $this refers to the current post object. 
// -> accesses the posts properties. 

$this->title = "Post Title";
$this->description = "A simple test post on the wrek CMS showing some capabilities of the default theme.";
$this->content = '<p>As you noticed, we can do HTML here.</p>

<p>Anything with single quotes must be escaped! \'</p>

<p>Don\'t.<br />
Can\'t.<br />
Shouldn\'t. </p>

<p>Otherwise you break EVERYTHING!</p>

<p><pre>
This is some code.
	
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
		echo getLinkCode();
	}
}</pre></p>

<h3>Grid System</h3><hr />

<p>This theme comes with some useful styling classes.</p>

<div class="s-box third-grid first-grid-item"><div class="inner-s-box">Ruh-roh.</div></div>
<div class="s-box third-grid"><div class="inner-s-box">Aww yeah.</div></div>
<div class="s-box third-grid"><div class="inner-s-box">Built-in grid system and other awesome styling classes!</div></div>

<div class="s-box third-grid first-grid-item"><div class="inner-s-box">Pretty cool!</div></div>
<div class="s-box third-grid"><div class="inner-s-box">The HTML sure looks odd...</div></div>
<div class="s-box third-grid"><div class="inner-s-box">But for an initial version, not too bad!</div></div>';