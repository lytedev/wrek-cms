A couple examples so you're not clueless when it comes to using wrek.

# Settings Examples

An example settings file is shown below with inline comments:

```
# Note that whitespace around the colon is irrelevent.
# The pound sign (#) indicates a comment - a comment is ignored entirely when parsed.

setting_name: value
posts_per_page	:		5
site_name       :		CAKE TASTES GREAT

# Nicely aligned settings... sometimes
site_description: 			For Science
site_salutation       :			Suck it up!
valuable_object:			gold
a number:					17
another number:				90
a setting with spaces:		It's almost like a cheat code.
```

# Valid Settings and their Defaults:

An example of a valid and useful `content/settings.txt` file.

```
# Wrek Settings
current_theme: 		default

# Site Settings
site_title: 		Wrek Site
site_description: 	Another wrek site.
site_slogan: 		We're the best!
site_author: 		Wrek
site_root: 			/
site_url: 			http://yoursite.com/

# Other Settings
posts_per_page: 	5
date_time_fmt: 		F j, Y g:ia
```

# Post Example

An example of a text post you might have. Save to the `content/posts` folder.

```
Title: A Humble Post
Date: 2011-11-18 17:04:01
Description: A simple post.
Author: Daniel "lytedev" Flanagan
Image: http://i.imgur.com/just_kidding
Show: true

Post content from here on down! Remember, each page gets its own text/html/php file.

If you want, just leave the image blank.

Set "Show" to 0, false, or a negative number to not show the post in the normal blog
listing. 

Post information names such as "Title", "Date", etc., are all case insensitive. 

P.S: The date format can be in any format understood by PHP's strtotime() function. 
Documentation: http://php.net/manual/en/function.strtotime.php

P.S.S: I'd recommend using the format shown here and to not use slashes!
```

# Theme Example

See the default theme in `content/themes/default` for an example theme.
(Disclaimer/reminder: I wrote all this as a newby programmer almost 5 years ago,
so it may not actually be the best example of anything.)


# Link Example

Links are for those of you who want site-wide links.

A very simple few lines - the last of which is the link URI:

```
Title: Twitter
Description: Follow us on Twitter!

http://lytedev.com
```

# Page Example

Example text page:

```
Title: A humble page.
Description: A simple page.
Image: http://i.imgur.com/just_kidding

Page content from here on down! Remember, each page gets its own text or html or php file.
```

