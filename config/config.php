<?php

    define ("DEBUG", true);

    define('DB_NAME', 'eagle_data'); // database name
    define('DB_USER', 'root'); // database user
    define('DB_PASSWORD', ''); // database password
    define('DB_HOST', '127.0.0.1'); // database host *** use IP address to avoid DNS lookup
    // default controller, if there isn't one defined on url 
    define ("DEFAULT_CONTROLLER", "Home"); 

    // if no layout is set in the controller use this layout
    define ("DEFAULT_LAYOUT", "default");
    
    // default controller, empty link 
    define ("PROOT", "/portal/");

    // this will be set if the site title
    define ("SITE_TITLE", "Eagle Portal");
    
    // Session name for logged user
    define("CURRENT_USER_SESSION_NAME", "ly8il8t8YIFdK324ch4SrxR3A53zEFyICre3iC8tFyuF6u921llgG");

    // cookie name for logged in user remember me
    define("REMEMBER_ME_COOKIE_NAME", "ly8il8t8YIe3iCaaJETaaFwo40w0u49712lgG");

    // how long should cookie last
    define("REMEMBER_ME_COOKIE_EXPIRY", 280000);

    // Controller name for restricted redirect
    define("ACCESS_RESTRICTED", "Restricted");