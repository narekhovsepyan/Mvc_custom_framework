<?php
    session_start();
    $uri=$_SERVER["REQUEST_URI"];
    $uri=substr($uri,1);
    function __autoload($class_name){
        $class_name=str_replace("_", "/", $class_name);
        include $class_name.".php";  
    }
    new System_routes($uri);
    
 