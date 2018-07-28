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
            
            class Usuarioo{
                
                private $idusuario;
                private $usuario;
                private $senha;
                private $datacadastro;
                
                
                public function getIdusuario(){
                    
                    return $this->idusuario;
                
            }
            
                public function getDeslogin(){
                    
                    return $this->usuario;
                    
                }
                
                public function getDessenha(){
                    
                    return $this->senha;
                    
                }
                public function getDtcadastro(){
                    
                    return $this->datacadastro;
                    
                }
                
                public function setIdUsuario($value){
                    
                    $this->idusuario = $value;
                    
                }
                public function setDeslogin($value){
                    
                    $this->usuario = $value;
                    
                }
                
                public function setDessenha($value){
                    
                    $this->senha = $value;
                    
                }
                public function setDtcadastro($value){
                    
                    $this->datacadastro = $value;
                    
                }
               
                
                //método que carrega apenas um usuario
                public function loadId($id){
                    
                    $sql = new Sql();
                    
                    
                    $resultado = $sql->selecionar("SELECT * FROM login WHERE idusuario = :ID", array(
                        ":ID"=>$id
                            
                        ));
                    
                    if (isset($resultado[0])){
                        
                        $resultrow = $resultado[0];
                        $this->setIdUsuario($resultrow['idusuario']);
                        $this->setDeslogin($resultrow['usuario']);
                        $this->setDessenha($resultrow['senha']);
                        $this->setDtcadastro($resultrow['datacadastro']);
                    }
                }
                
                
                //Método que retorna uma lista de usuários
                public static function getLista(){
                    
                    
                    $sql = new Sql();
                    
                    return $sql->selecionar("SELECT * FROM login ORDER BY idusuario;");
                    
                }
                
                //função que 
                public static function Logar($loginn, $password){
                    
                    $sql = new Sql();
                    
                    $resultado = $sql->selecionar("SELECT * FROM login WHERE usuario = :LOGIN AND senha = :PASSWORD",array(
                        
                        ":LOGIN"=>$loginn,
                        ":PASSWORD"=>$password
                    ));
                    
                    if(count($resultado)>0){
                        
                        $resultrow = $resultado[0];
                        $this->setIdUsuario($resultrow['idusuario']);
                        $this->setDeslogin($resultrow['usuario']);
                        $this->setDessenha($resultrow['senha']);
                        $this->setDtcadastro(new DateTime($resultrow['datacadastro']));
                        
                        
                        
                    }else{
                        
                        
                        throw new Exception("Login e senha inválido: ");
                        
                    }
                
                }
                
                public function setarDados($dados){
                   
                    $this->setIdUsuario($dados['idusuario']);
                    $this->setDeslogin($dados['usuario']);
                    $this->setDessenha($dados['senha']);
                    $this->setDtcadastro(new DateTime($dados['datacadastro']));
                    
                }
                
               
                
                public function inserirdados(){
                    
                    $sql = new Sql(); 
                    
                    $resultinserir = $sql->selecionar("CALL sp_usuario_insert(:LOGIN, :PASSWORD)", array(
                        ":LOGIN"=>$this->getDeslogin(),
                        ":PASSWORD"=>$this->getDessenha()
                    ));
                    
                    if (count($resultinserir) > 0){
                        
                        $this->setarDados($resultinserir[0]);
                        
                    }
        
                }
                
                public function atualizarDados($login, $password){
                    
                    $this->setDeslogin($login);
                    $this->setDessenha($password);
                    
                    $sql = new Sql();
                    $sql->query("UPDATE login SET usuario = :LOGIN, senha = :PASSWORD, idusuario =  :ID", array(
                        
                        ":LOGIN"=>$this->getDeslogin(),
                        ":PASSWORD"=>$this->getDessenha(),
                        ":ID"=>$this->getIdUsuario()
                    ));
                           
                }
                
                public function deletarDados(){
                    
                    $sql = new Sql();
                    $sql->query("DELETE FROM login WHERE idusuario = :ID", array(
                        ":ID"=>$this->getIdusuario()
                    ));
                    
                    
                    $this->setIdUsuario(0);
                    $this->setDeslogin("");
                    $this->setDessenha("");
                    $this->setDtcadastro(new DateTime());
                            
                }
                
                public function __construct($login = "",$password = ""){
                    
                    $this->setDeslogin($login);
                    $this->setDessenha($password);
                    
                }
                
                //Cria um JSON para imprimir os valores 
                public function __toString() {
                    return json_encode(array(
                        
                        "idusuario"=>$this->getIdusuario(),
                        "usuario"=>$this->getDeslogin(),
                        "senha"=>$this->getDessenha(),
                        "datacadastro"=>$this->getDtcadastro()
                    ));
                }
            }
           
       
            
        ?>
    </body>
</html>
