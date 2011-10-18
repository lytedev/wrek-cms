<?php 

getHeader();

if (contentType() == "post") {
	currentPost()->show(); 
} else if (contentType() == "blog") {
	printLatestPosts(((getCurrentPage() - 1) * getSetting("posts_per_page")));	
} else if (contentType() == "page") {
	currentPage()->showPage();	
} else { // Index
	printLatestPosts();
}

?> <div class="clearfix"></div> <?php 

getFooter(); 