
			<?php if (!($noSidebar)) { require_once("sidebar.php"); } ?>
			<div class="clearfix"></div>
		</div>

		<footer>
			<div id="copyright" class="quarter-column dark">
				<!-- <h3>Footer Column Header</h3> -->
				Copyright &copy; LyteDev <?php echo date("Y"); ?>
			</div>
			<div class="column-spacer">&nbsp;</div>
			<div id="copyright" class="quarter-column dark">
				<!-- <h3>Footer Column Header</h3> -->
				<p><b>Contact Lyte</b>Dev</p>
				<ul>
					<li><a href="mailto:lytedev@flansite.com">Email</a></li>
					<li><a href="http://twitter.com/LyteDev">Twitter</a></li>
				</ul>
			</div>
			<div class="column-spacer">&nbsp;</div>
			<div id="copyright" class="quarter-column dark">
				<!-- <h3>Footer Column Header</h3> -->
				Nothing
			</div>
			<div class="column-spacer">&nbsp;</div>
			<div id="copyright" class="quarter-column dark">
				<!-- <h3>Footer Column Header</h3> -->
				<form class="donate-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick" />
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
					<input class="button wide-button" type="button" value="Donate" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
				</form>
			</div>
		</footer>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>

	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>

	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg'); </script>
	<![endif]-->
</body>
</html>