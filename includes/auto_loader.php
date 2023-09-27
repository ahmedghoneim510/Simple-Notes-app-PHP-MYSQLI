<?php
    spl_autoload_register('myautoload');
function myautoload($classname){
    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url,'includes')!==false){

        $pass="../classes/";
    }
    else
    {
        $pass="classes/";
    }
    $extention=".php";
    $fullpass=$pass.$classname.$extention;
    include_once $fullpass;
}