<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/Ingrediente.Class.php'; 
require_once '../DAO/IngredienteDAO.php'; 

//declaração da classe Produto.Control
class IngredienteControl
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
           $DAO = new IngredienteDAO;
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new IngredienteDAO;  
           $DAO->alterar($this->setObj());
               break;
           case 3:
           $DAO = new IngredienteDAO;
           var_dump($_REQUEST["tbMateria_prima_idmateria_prima"]);
           $DAO->excluir($_REQUEST["tbMateria_prima_idmateria_prima"]);
               break;
       }
   }
   
   //listagem de todos os Usuarios cadastrados
   public function listar() 
   {
	   $IngredienteDAO = new IngredienteDAO;
	   return $IngredienteDAO->listar();
   }

    //listagem 1 Usuario cadastrado por id
    public function listarPorId($tbMateria_prima_idmateria_prima) 
    {
        $IngredienteDAO = new IngredienteDAO;
        return $IngredienteDAO->listarPorId($tbMateria_prima_idmateria_prima);	   
        
    }
   private function setObj()
   {
        $Ingrediente = new Ingrediente;      
        $Ingrediente->setTbMateria_prima_idmateria_prima($_REQUEST["tbMateria_prima_idmateria_prima"]);
        $Ingrediente->setTbReceita_idreceita($_REQUEST["tbReceita_idreceita"]);
        $Ingrediente->setQuantidade($_REQUEST["quantidade"]);
        $Ingrediente->setPreco($_REQUEST["preco"]);
        return $Ingrediente; 
   
   }
   
  
}
new IngredienteControl();