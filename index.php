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