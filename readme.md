# wrek

wrek is a super simple file-based content management system.

# Setup

`git clone git@github.com:lytedev/wrek-cms.git projectname`

Change the content and host it at the root of the newly created folder. For
locally hosting during development, I recommend the following command:

```
cd projectname
php -S localhost:8000
```

Then open your browser so `localhost:8000`.

# Configuration

Generally, the `lib` folder contains stuff you shouldn't need to touch unless
you need something really odd done. Most of your site's configuration can happen
in the `content` folder.

Site-wide settings are found in `content/settings.txt`.

Don't forget to change all the `apple-touch-icon` images and the favicon!

You might flip through the other files in the project root, as most of them come
from a very old version of the [HTML5 Boilerplate][html5bp]

# Themes

Themes are a smart way of keeping the structure and layout of your content
separate from your actual content. Themes are stored in `content/themes`.

Themes are made up of at least an `index.php` file, but you're encouraged to
include at least (as needed) the following files:

* `index.php`
* `header.php`
* `footer.php`
* `page.php`
* `post.php`
* `smallpost.php` (the post as it appears on the blog page)

# Content

There are various ways of managing content and the plain-text formats in wrek.
There's a handy little text document that does a decent job of explaining them.
You can find that document [here][content_docs].


[html5bp]: https://github.com/h5bp/html5-boilerplate
[content_docs]: https://github.com/lytedev/wrek-cms/blob/master/content_examples.md
