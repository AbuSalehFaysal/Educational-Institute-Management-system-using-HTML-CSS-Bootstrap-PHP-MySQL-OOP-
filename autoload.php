<?php 

	spl_autoload_register(function($className){
        $class_link = $className.'.php';
        if (!file_exists($class_link)) {
            # code...
            return false;
        }
        include_once $className.'.php';
    });



 ?>