<?php

//inclusões dos codigos das Classe Model e DAO
require_once '../Model/GastoEspecifico.Class.php'; 
require_once '../DAO/GastoEspecificoDAO.php'; 

//declaração da classe Produto.Control
class GastoEspecificoControl
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
           $DAO = new GastoEspecificoDAO;
           $DAO->inserir($this->setObj());
               break;
           case 2:
           $DAO = new GastoEspecificoDAO;  
           $DAO->alterar($this->setObj());
               break;
           case 3:
           $DAO = new GastoEspecificoDAO;
           $DAO->excluir($_REQUEST["tbGastos_extras_idgastos_extras"]);
               break;
       }
   }
   
   //listagem de todos os Usuarios cadastrados
   public function listar() 
   {
	   $GastoEspecificoDAO = new GastoEspecificoDAO;
	   return $GastoEspecificoDAO->listar();
   }

    //listagem 1 Usuario cadastrado por id
    public function listarPorId($tbReceita_idreceita) 
    {
        $GastoEspecificoDAO = new GastoEspecificoDAO;
        return $GastoEspecificoDAO->listarPorId($tbReceita_idreceita);	   
        
    }
   private function setObj()
   {
        $gastos_e = new GastoEspecifico;      
        $gastos_e->settbGastos_extras_idgastos_extras($_REQUEST["tbGastos_extras_idgastos_extras"]);
        $gastos_e->setTbReceita_idreceita($_REQUEST["tbReceita_idreceita"]);
        $gastos_e->setQuantidade($_REQUEST["quantidade"]);
        $gastos_e->setPreco_gasto_extra($_REQUEST["preco_gasto_extra"]);
        return $gastos_e; 
   
   }
   
  
}
new GastoEspecificoControl();