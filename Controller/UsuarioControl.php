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
       if(isset($_REQUEST["acao"])){
           $acao=$_REQUEST["acao"];
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
           $DAO->excluir($_REQUEST["idusuario"]);
               break;
           case 4:
           $DAO = new UsuarioDAO;  
           $DAO->login($_REQUEST["login"],$_REQUEST["senha"]);
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
       $usu = new Usuario;
       
	   if (isset ($_REQUEST["idusuario"]))
	   {
            $usu->setIdusuario($_REQUEST["idusuario"]);
            $usu->setNome($_REQUEST["nome"]);
            $usu->setEmail($_REQUEST["email"]);
            $usu->setLogin($_REQUEST["login"]);
            $usu->setSenha($_REQUEST["senha"]);
            $usu->setTipo($_REQUEST["tipo"]);
            return $usu; 
	   }else {
            $usu->setNome($_REQUEST["nome"]);
            $usu->setEmail($_REQUEST["email"]);
            $usu->setLogin($_REQUEST["login"]);
            $usu->setSenha($_REQUEST["senha"]);
            $usu->setTipo($_REQUEST["tipo"]);
		    return $usu;
	   }
		
	   
   }
   
  
}
new UsuarioControl();