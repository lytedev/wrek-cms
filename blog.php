<?php require_once("header.php"); ?>

<div class="three-quarter-column">
	<?php 
	
	if (isset($_GET['p']))
	{
		echoPost(getPost($_GET['p']));
	}
	else 
	{
		echoPosts(cfg("maxposts")); 
	}
	
	?>
	<!-- It's here for a reason. -->
</div>

<?php require_once("footer.php"); ?>