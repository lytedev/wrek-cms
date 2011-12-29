<div class="post">
<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
<h1 class="post-title"><a href="<?php echo $this->getPermalink(); ?>" title=""><?php echo $this->title; ?></a></h1>
<a href="" title="<?php echo date(getSetting("date_time_fmt"), $this->date); ?>"><div class="post-date"><?php echo $this->timeAgo(); ?></div></a>
<div class="clearfix"></div>
			
<div class="post-content"><?php echo $this->content; ?></div>
</div>

<div id="disqus_thread"></div>
<script type="text/javascript">
	var disqus_shortname = 'lytedev2';
	var disqus_identifier = '<?php echo $this->link_id; ?>';
	var disqus_url = '<?php echo getSetting("site_url") . "blog/" . $this->link_id; ?>';
	var disqus_developer = 1;
	(function() {
		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

