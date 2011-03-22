<?php 

require_once("header.php"); 
if (cfg("twitterun") == "")
{ ?>

<div>
	<h2>.recent posts</h2>
	<?php echoPosts(cfg("maxposts"), false); ?>
</div>

<?php } else { ?>

<div class="column">
	<h2>.recent posts</h2>
	<?php echoPosts(cfg("maxposts"), false); ?>
</div><div class="column-spacer">&nbsp;</div>
<div class="column">
	<h2>.twitter</h2>
	<?php getTwitter(cfg("twitterun")); ?>
</div>

<?php } 

require_once("footer.php"); 

?>