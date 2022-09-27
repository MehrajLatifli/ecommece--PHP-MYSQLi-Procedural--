<?php

session_start();

require_once "db.php";

require_once "function.php";


$lang=isset($_GET['lang'])?$_GET['lang']:(isset($_COOKIE['lang'])?$_COOKIE['lang']:1);

setcookie('lang',$lang,time()+(86400*30),"/");


$page = isset($_GET['page']) ? $_GET['page'] : getMainPage($lang,$conn);


$langchooseactive=isset($_COOKIE['langchooseactive'])?$_COOKIE['langchooseactive']:"langchooseactive";

setcookie($langchooseactive, $langchooseactive, time() + (86400 * 30), "/");


if (!isset($_SESSION["username"]) ||  isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") {
    session_unset();
    session_destroy();

    $lang=isset($_GET['lang'])?$_GET['lang']:(isset($_COOKIE['lang'])?$_COOKIE['lang']:1);

    setcookie('lang',$lang,time()+(86400*30),"/");
 
}




include "header.php";

include "main.php";

include "footer.php";


mysqli_close($conn);