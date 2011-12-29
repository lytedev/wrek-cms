<?php 

getHeader();

if (getArg(0) == "sitemap") {
	echo "<h2>Page Index</h2><br />";
	echo getAllPageLinks();
	echo "<br /><h2>Post Index</h2><br />";
	echo getAllPostLinks();
	echo "<br /><h2>Link Index</h2><br />";
	echo getAllLinkLinks();
} else if (contentType() == "post") {
	if (currentPost() == false) { echo "Could not find specified post!"; } else { currentPost()->show(); }
} else if (contentType() == "blog") { 
	echo "<h1><a href=\"" . getRoot() . "blog/\" title=\"" . siteTitle() . "'s blog" . "\">Blog</a></h1><br />";
	printLatestPosts(((getCurrentPage() - 1) * getSetting("posts_per_page")));	
} else if (contentType() == "page") {
	if (currentPage() == false) { echo "Could not find specified page!"; } else { currentPage()->showPage(); }
} else { // Index 
	?>
	
	<h1><a href="" title="<?php echo siteTitle(); ?> home">Hello</a></h1><br />
	<h3><?php echo getSetting("site_description"); ?></h3><br />
	<h3>Still interested? Okay, then. Click one of these bad boys.</h3>
	
	<a href="<?php echo getRoot(); ?>blog">
	<div class="s-box third-grid first-grid-item"><div class="inner-s-box">
		<center>
			<h3 class="link">Blog</h3>
		</center>
	</div></div></a>
	<a href="<?php echo getRoot(); ?>about">
	<div class="s-box third-grid"><div class="inner-s-box">
		<center>
			<h3 class="link">About</h3>
		</center>
	</div></div></a>
	<a href="<?php echo getRoot(); ?>downloads">
	<div class="s-box third-grid"><div class="inner-s-box">
		<center>
			<h3 class="link">Downloads</h3>
		</center>
	</div></div></a>

	<?php 
}

?> <div class="clearfix"></div> <?php 

getFooter(); 