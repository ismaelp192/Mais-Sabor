<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/Categoria.Class.php'; 
require_once '../DAO/CategoriaDAO.php'; 
ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
//declaração da classe Produto.Control
class CategoriaControl
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
           $DAO = new CategoriaDAO;
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new CategoriaDAO;  
           $DAO->alterar($this->setObj());
               break;
           case 3:
           $DAO = new CategoriaDAO;
           $DAO->excluir($_REQUEST["idcategoria"]);
               break;
       }
   }
   
   //listagem de todos os Categoriaarios cadastrados
   public function listar() 
   {
	   $categoriaDAO = new CategoriaDAO;
	   return $categoriaDAO->listar();
   }

    //listagem 1 Categoriaario cadastrado por id
    public function listarPorId($idcategoria) 
    {
        $categoriaDAO = new CategoriaDAO;
        return $categoriaDAO->listarPorId($idcategoria);	   
        
    }
   private function setObj()
   {
       $categoria = new Categoria;
       
	   If (isset ($_REQUEST["idcategoria"]))
	   {
            $categoria->setIdcategoria($_REQUEST["idcategoria"]);
            $categoria->setNome_categoria($_REQUEST["nome_categoria"]);
            return $categoria; 
	   }else {
            $categoria->setNome_categoria($_REQUEST["nome_categoria"]);
		    return $categoria;
	   }
		
	   
   }
   
  
}
new CategoriaControl();