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
        
        require_once "config.php";
      
        
        $buscarlista = Usuarioo::Logar("igor");
        
        echo json_encode($buscarlista);
        
        /*
       
         *  $root = new Usuarioo();
        
         *  //Chamando o método para listar usuários.
        $lista = Usuarioo::getLista();
        echo json_encode($lista);
        $root->loadId(1);
        
        echo $root;        
        
        $sql = new Sql();
        
        $usuarios = $sql->selecionar("SELECT * FROM login");
        
        echo json_encode($usuarios);
         * 
         *          */
        
        ?>
    </body>
</html>
