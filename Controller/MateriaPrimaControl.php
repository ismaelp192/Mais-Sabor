<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/MateriaPrima.Class.php'; 
require_once '../DAO/MateriaPrimaDAO.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);
//declaração da classe Produto.Control
class MateriaPrimaControl
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
           $DAO = new MateriaPrimaDAO;
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new MateriaPrimaDAO;  
           $DAO->alterar($this->setObj());
               break;
           case 3:
           $DAO = new MateriaPrimaDAO;
           $DAO->excluir($_REQUEST["idmateria_prima"]);
               break;
       }
   }
   
   //listagem de todos os Usuarios cadastrados
   public function listar() 
   {
	   $materiaprimaDAO = new MateriaPrimaDAO;
	   return $materiaprimaDAO->listar();
   }

    //listagem 1 Usuario cadastrado por id
    public function listarPorId($idmateria_prima) 
    {
        $materiaprimaDAO = new MateriaPrimaDAO;
        return $materiaprimaDAO->listarPorId($idmateria_prima);	   
        
    }
   private function setObj()
   {
       $materiaprima = new MateriaPrima;
       
	   If (isset ($_REQUEST["idmateria_prima"]))
	   {
            $materiaprima->setIdmateria_prima($_REQUEST["idmateria_prima"]);
            $materiaprima->setNome($_REQUEST["nome"]);
            $materiaprima->setData_validade($_REQUEST["data_validade"]);
            $materiaprima->setQuantidade($_REQUEST["quantidade"]);
            $materiaprima->setPreco($_REQUEST["preco"]);
            $materiaprima->setTipo_medida($_REQUEST["tipo_medida"]);
            return $materiaprima; 
	   }else {
            $materiaprima->setNome($_REQUEST["nome"]);
            $materiaprima->setData_validade($_REQUEST["data_validade"]);
            $materiaprima->setQuantidade($_REQUEST["quantidade"]);
            $materiaprima->setPreco($_REQUEST["preco"]);
            $materiaprima->setTipo_medida($_REQUEST["tipo_medida"]);
		    return $materiaprima;
	   }
		
	   
   }
   
  
}
new MateriaPrimaControl();