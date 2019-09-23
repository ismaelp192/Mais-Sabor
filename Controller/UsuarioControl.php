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
           $DAO = new UsuarioDAO;  
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new UsuarioDAO;  
           $DAO->alterar($this->setObj());
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
   private function setObj()
   {
        var_dump($_POST);
       $usu = new Usuario;
	   if (isset ($_POST["idusuario"])){
            $usu->setIdusuario($_POST["idusuario"]);
        }
        $usu->setNome($_POST["nome"]);
        $usu->setEmail($_POST["email"]);
        $usu->setLogin($_POST["login"]);
        $usu->setSenha($_POST["senha"]);
        $usu->setTipo($_POST["tipo"]);
        $usu->setImage($_POST["image"]);
        return $usu; 	   
   }
}
new UsuarioControl();