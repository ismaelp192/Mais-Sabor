<?php
    require_once '../Model/Receita.Class.php';
    require_once '../DAO/ReceitaDAO.php';
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    class ReceitaControl{

		public $acao;

	  	function __construct(){
	       if(isset($_REQUEST["acao"])){
	           $acao=$_REQUEST["acao"];
			   $this->verificaAcao($acao);
	       }
  		}

  		function verificaAcao($acao){
            switch ($acao){
                case 1:
                $DAO = new  ReceitaDAO;
                $DAO->inserir($this->setObj());
                    break;
                case 2:
                $DAO = new  ReceitaDAO;  
                If ($DAO->alterar($this->setObj()))
                {
                    header("Location:../View/ReceitaLista.php");
                }
                    break;
                case 3:
                $DAO = new  ReceitaDAO;
                $DAO->excluir($_REQUEST["idreceita"]);
                    break;
                
            }
        }

        private function setObj()
   {
       var_dump($_REQUEST["materiais"]);
	   $usu = new Receita;
	   If (isset ($_REQUEST["idreceita"]))
	   {
            $receita = new Receita;
            $receita-> setIdreceita($_REQUEST["idreceita"]);
            $receita-> setNome($_REQUEST["nome"]);
            $receita-> setValor_Receita($_REQUEST["valor_receita"]);
            $receita-> setDescricao($_REQUEST["descricao"]);
            $receita-> setLucro($_REQUEST["lucro"]);
            $receita-> setValor_Final($_REQUEST["valor_final"]);
            $receita-> setTbCategoria_nome_categoria($_REQUEST["tbCategoria_nome_categoria"]);
            return $receita; 
	   }else {
            $receita = new Receita;
            $receita-> setNome($_REQUEST["nome"]);
            $receita-> setValor_Receita($_REQUEST["valor_receita"]);
            $receita-> setDescricao($_REQUEST["descricao"]);
            $receita-> setLucro($_REQUEST["lucro"]);
            $receita-> setValor_Final($_REQUEST["valor_final"]);
            $receita-> setTbCategoria_nome_categoria($_REQUEST["tbCategoria_nome_categoria"]);
            return $receita; 
	   }
		
	   
   }
	   	public function listar(){
	   		$receitaDAO = new receitaDAO;
	   		return $receitaDAO->listar();
	   	}

	   	public function listarPorId($idreceita){
	   		$receitaDAO = new receitaDAO;
	   		return $receitaDAO->listarPorId($idreceita);
	   	}

}
new ReceitaControl();