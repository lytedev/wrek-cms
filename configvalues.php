<?php

/* 

Add config values using the addcfg($key, $value[, $type]) function
Get config values using the cfg($key) function
Echo config values using the ecfg($key) function

See "config.php" for details

*/

// ************ Only remove once the installation script tells you so! ************
addcfg("configured", false);

// Site - Basic Site Configuration Variables
addcfg("root", ".");
addcfg("sitename", "wrek");
addcfg("sitedescription", "A wrek-based site.");

// Admin - Login Information for Admin Page, "admin.php"
addcfg("username", "admin"); // Change This!
addcfg("password", "password"); // Change This!
addcfg("passwordismd5", false); // Recommended: true, but if set to true, cfg("password") must be an md5 hash, not the password string

// Data - Database Connection Details
addcfg("dbhost", "");
addcfg("dbuser", "");
addcfg("dbpass", "");
addcfg("dbname", "");

// Blog - Various Blog Control Variables
addcfg("disqussn", ""); // disqus.com forum shortname

addcfg("twitterun", ""); // twitter.com username

addcfg("ldtfmt", "l, F dS, Y g:i a");
addcfg("sdtfmt", "j.n.y g:i a");
addcfg("maxposts", 5);
addcfg("maxadminposts", 50);

?>