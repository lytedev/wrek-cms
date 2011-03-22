<?php require_once("header.php"); ?>

<<<<<<< HEAD

<?php 

if (isset($_GET['p']))
{
	$post = getPost($_GET['p'], cfg("ldtfmt"));
	echoPost($post, true);
	if ($post['comments'] === true && cfg("enabledisqus") === true)
	{ echo $post['id']; 
	?>
	<hr />
	<br />
	<div id="disqus_thread"></div>
	<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = '<?php ecfg("disqussn"); ?>'; // required: replace example with your forum shortname

		// The following are highly recommended additional parameters. Remove the slashes in front to use.
		var disqus_identifier = '<?php echo $post['id']; ?>';
		// var disqus_url = 'http://example.com/permalink-to-page.html';
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<?php
	}
}
else if (isset($_GET['o']))
{ ?>
	<h2>.blog</h2>
	<?php echoPosts(cfg("maxposts"), false, $_GET['o'], true); ?>
<?php }
else
{ ?>
	<h2>.blog</h2>
	<?php echoPosts(cfg("maxposts"), false, 0, true); ?>
<?php 

}

require_once("footer.php"); 

?>
=======
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
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f
