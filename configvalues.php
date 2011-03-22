<?php

<<<<<<< HEAD
/* 

Add config values using the addcfg($key, $value[, $type]) function
Get config values using the cfg($key) function
Echo config values using the ecfg($key) function

See "config.php" for details

*/

// ************ Only remove once the installation script tells you so! ************
// addcfg("configured", false);

// Site - Basic Site Configuration Variables
addcfg("root", ".");
addcfg("sitename", "wrek");
addcfg("sitedescription", "A wrek-based website.");

// Admin - Login Information for Admin Page, "admin.php"
addcfg("username", "admin"); // Change This!
addcfg("password", "root"); // Change This!
addcfg("passwordismd5", false); // Recommended: true

// Data - Database Connection Details
addcfg("dbhost", "");
addcfg("dbuser", "");
addcfg("dbpass", "");
addcfg("dbname", "");

// Blog - Various Blog Control Variables
addcfg("disqussn", ""); // disqus.com

addcfg("twitterun", ""); // twitter.com

addcfg("ldtfmt", "l, F dS, Y g:i a");
addcfg("sdtfmt", "j.n.y g:i a");
addcfg("maxposts", 5);
addcfg("maxadminposts", 50);
=======
// Site
addcfg(".", "root");

// Data
addcfg("localhost", "dbhost");
addcfg("root", "dbuser");
addcfg("", "dbpass");
addcfg("lytedev", "dbname");
addcfg("root", "dbuser");

// Blog
addcfg("dtfmt", "F S, Y g:i a");
addcfg("maxposts", 8);
>>>>>>> cdb8935787db00c2e4c0a9cdf23cce2533d5e86f

?>