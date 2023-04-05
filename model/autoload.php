<?php

spl_autoload_register(function($class){
    $prefix =  "Model\\";
    $baseDir = __DIR__ . "/";
    $len = strlen($prefix);

    var_dump($class);

    if(strncmp($prefix, $class, $len) !== 0){
        return;
    }

    $relativeClass = substr($class, $len);
    
    $file = $baseDir.str_replace("\\", "/", $relativeClass) . ".php"; 
   
    if (file_exists($file)){
        require $file;
    }
});