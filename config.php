<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        spl_autoload_register(function($class_name){
            
            $filename = "classes".DIRECTORY_SEPARATOR.$class_name.".php";
            
            if(file_exists($filename)){
                
                require_once($filename);      
            }
        });
        
        ?>
    </body>
</html>
