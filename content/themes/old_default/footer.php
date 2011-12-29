			<div id="very-bottom"></div>
			</div>
		</div>
	</div>
	<footer>
		<div class="wrapper">
			<div id="copyright">
				Copyright &copy <?php echo siteTitle(); ?> <?php echo date('Y'); ?>
			</div>
			<nav id="footer-nav">			
				<?php printLinks(); ?>			
			</nav>
		</div>
	</footer>
	<script defer src="lib/js/plugins.js"></script>
	<?php if (file_exists(currentThemeDirectory() . "scripts.php")) { require(currentThemeDiretory() . "scripts.php"); } ?>
	<?php /* <script> // Change UA-XXXXX-X to be your site's ID
	window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
	Modernizr.load({
		load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
	});
	</script> */ ?>
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>