<<<<<<< HEAD
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
=======
<?php require_once("header.php"); ?>

<div class="column">
	<h2>Blog</h2>
	<?php echoPosts(cfg("maxposts"), false); ?>
</div><div class="column-spacer">&nbsp;</div>
<div class="column">
	<h2>Something</h2>
	<p>Content for Something.</p>
</div><div class="column-spacer">&nbsp;</div>
<div class="column">
	<h2>Something Else</h2>
	<p>More pointless content.</p>
</div>

<?php $noSidebar = true; ?>
<?php require_once("footer.php"); ?>
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
