<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/Usuario.Class.php'; 
require_once '../DAO/UsuarioDAO.php'; 
session_start();
ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
//declaração da classe Produto.Control
class UsuarioControl
{
   private $acao;
   
   function __construct()
   {     
        $_POST=  json_decode(file_get_contents("php://input"),true);  
        if(isset($_REQUEST)&& !isset($_POST)){
            $_POST=$_REQUEST;
        }  
        if(isset($_POST["acao"])){
            $acao=$_POST["acao"];
            $this->verificaAcao($acao);
    }
   }
    function verificaAcao($acao){
        switch ($acao){
            case 1:
                $this->setObj($acao);
            break;
            case 2:
                $this->setObj($acao);
            break;
            case 3:
                $DAO = new UsuarioDAO;
                $DAO->excluir($_POST["idusuario"]);
            break;
            case 4:
                $DAO = new UsuarioDAO;  
                $DAO->login($_POST["login"],$_POST["senha"]);
            break;
            case 5:
                $DAO = new UsuarioDAO;  
                $DAO->deslogar();
            break;
            case 6:
                $DAO = new UsuarioDAO;  
                $DAO->recuEmail($_POST["email"]);
            break;
       }
   }
   
   //listagem de todos os Usuarios cadastrados
   public function listar() 
   {
	   $usuarioDAO = new UsuarioDAO;
	   return $usuarioDAO->listar();
   }

    //listagem 1 Usuario cadastrado por id
    public function listarPorId($idusuario) 
    {
        $usuarioDAO = new UsuarioDAO;
        return $usuarioDAO->listarPorId($idusuario);	   
        
    }
   private function setObj($acao)
   {
    var_dump($_FILES);
    
      
       $usu = new Usuario;
       $DAO = new UsuarioDAO;  

	   if (isset ($_POST["idusuario"])){
            $usu->setIdusuario($_POST["idusuario"]);
        }
        if (isset ($_POST["senha"])){
            $usu->setSenha($_POST["senha"]);
        }
        $usu->setNome($_POST["nome"]);
        $usu->setEmail($_POST["email"]);
        $usu->setlogin($_POST["login"]);
        $usu->setTipo($_POST["tipo"]);
        if(sizeof($_FILES)>0){
            $file=$_FILES["files"];
            $fname=$file["name"];
            $usu->setImage("usr_img/".$fname);
        }else if(isset($_POST["image"])){
            $usu->setImage($_POST["image"]);
        }else{
            $usu->setImage("usr_img/default_user.png");  
        }
        if($acao==1){
            $move=$DAO->inserir($usu);
        }else{
            $move=$DAO->alterar($usu); 	   
        }
        if($move==true){
            if(move_uploaded_file($file["tmp_name"],"../usr_img/".$file["name"])){
            }else{
                echo "<h3>Erro, o arquivo não pode ser enviado:</h3><br>";
                echo "O ARQUIVO SUPERA O LIMITE DE TAMANHO PERMITIDO, ADICIONE UMA FOTO MENOR <br>";
            }
        }
   }
}
new UsuarioControl();