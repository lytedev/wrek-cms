<a href="<?php echo $this->getPermalink(); ?>">
<div class="small-post s-box" <?php echo $this->getUserdata("local_id") == 0 ? "id=\"top-post\"" : ""; ?>><div class="inner-s-box inner-post">
<?php echo $this->image != "" ? "<img src=\"" . $this->image . "\" />" : ""; ?>
<h2 class="post-title"><?php echo $this->title; ?></h2>
<div class="post-date"><?php echo $this->timeAgo();/*date(getSetting("date_time_fmt"), $this->date);*/ ?></div>
<div class="clearfix"></div>
<div class="post-description"><?php echo $this->description == "" ? $this->content : $this->description; ?></div>
</div></div>
</a>