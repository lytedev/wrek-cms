<div class="post">
<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
<h1 class="post-title"><a href="<?php echo $this->getPermalink(); ?>" title=""><?php echo $this->title; ?></a></h1>
<a href="" title="<?php echo date(getSetting("date_time_fmt"), $this->date); ?>"><div class="post-date"><?php echo $this->timeAgo(); ?></div></a>
<div class="clearfix"></div>
			
<div class="post-content"><?php echo $this->content; ?></div>
</div>