<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/GastoExtra.Class.php'; 
require_once '../DAO/GastoExtraDAO.php'; 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//declaração da classe Produto.Control
class GastoExtraControl{
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
           $DAO = new GastoExtraDAO;
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new GastoExtraDAO;  
           $DAO->alterar($this->setObj());
               break;
           case 3:
           $DAO = new GastoExtraDAO;
           $DAO->excluir($_REQUEST["idgastos_extras"]);
               break;
       }
   }
   
   //listagem de todos os gasarios cadastrados
   public function listar() 
   {
	   $GastoExtraDAO = new GastoExtraDAO;
	   return $GastoExtraDAO->listar();
   }

    //listagem 1 gasario cadastrado por id
    public function listarPorId($idgastos_extras) 
    {
        $GastoExtraDAO = new GastoExtraDAO;
        return $GastoExtraDAO->listarPorId($idgastos_extras);	   
        
    }
   private function setObj()
   {
       $gas = new GastoExtra;
       
	   If (isset ($_REQUEST["idgastos_extras"]))
	   {
            $gas->setIdgastos_extras($_REQUEST["idgastos_extras"]);
            $gas->setNome($_REQUEST["nome"]);
            $gas->setQuantidade($_REQUEST["quantidade"]);
            $gas->setValor($_REQUEST["valor"]);
            $gas->setTipo_medida($_REQUEST["tipo_medida"]);
            return $gas; 
	   }else {
            $gas->setNome($_REQUEST["nome"]);
            $gas->setQuantidade($_REQUEST["quantidade"]);
            $gas->setValor($_REQUEST["valor"]);
            $gas->setTipo_medida($_REQUEST["tipo_medida"]);
		    return $gas;
	   }
		
	   
   }
   
  
}
new GastoExtraControl();