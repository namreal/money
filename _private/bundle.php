<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

use \Database\Init as DB;

require_once('database.php');
require_once('config.php');

if ($DB_using)
    $DB = new DB($DB_host, $DB_user, $DB_pass, $DB_name);

/* if (!isset($_COOKIE['email']) && !isset($_COOKIE['pass']) )
{
    header('Location: /login.php');
}
else{
    $exist = $DB->rows('select id from user where email = "'.$_COOKIE['email'].'" and pass="'.$_COOKIE['pass'].'"');
    if(!$exist){
        header('Location: /logout.php');
        exit;
    }
} */