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
        
            class Sql extends PDO{
                
                private $conn;
                
                
                //Criando uma função construtora para que englobe o mecanismo de conexão com o banco de dados
                public function __construct(){
                    
                    $this->conn = new PDO("mysql:host=localhost;dbname=cadastrosimples", "root", "");
                    
                }
                
                
                //função de setarparametros
                private function setParams($stmt, $parameters = array()){
                   
                    foreach ($parameters as $key => $value) {
                        
                        $this->bindParam($key, $value);
                        
                    } 
                }
               
                private function setumParam($stmt,$key, $value){
                    
                    $statment->bindParam($key, $value);
                }
                
                
                public function query($rawQuery, $params = array()){
            
                    $stmt = $this->conn->prepare($rawQuery);
                    $this->setParams($stmt,$params);
                    
                    $stmt->execute();
                   
                    return $stmt;
                }   
                
                public function selecionar($rawQuery, $params = array()){
                    
                    $stmt = $this->query($rawQuery, $params);
                    
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
                }
            }
        ?>
    </body>
</html>
