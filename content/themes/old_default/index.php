<?php 

getHeader();

if (contentType() == "post") {
	if (currentPost() == false) { echo "Could not find specified post!"; } else { currentPost()->show(); }
} else if (contentType() == "blog") { 
	echo "<h1><a href=\"" . getRoot() . "blog/\" title=\"" . siteTitle() . "'s blog" . "\">blog</a></h1><br />";
	printLatestPosts(((getCurrentPage() - 1) * getSetting("posts_per_page")));	
} else if (contentType() == "page") {
	if (currentPage() == false) { echo "Could not find specified page!"; } else { currentPage()->showPage(); }
} else { // Index 
	?>
	
	<h1><a href="" title="<?php echo siteTitle(); ?> home">hello</a></h1><br />
	<h2><?php echo getSetting("site_description"); ?></h2><br /><hr />	
	<h1><a href="<?php echo getRoot(); ?>blog/" title="<?php echo siteTitle(); ?>'s blog">blog</a></h1><br />

	<?php printLatestPosts();
}

?> <div class="clearfix"></div> <?php 

getFooter(); 