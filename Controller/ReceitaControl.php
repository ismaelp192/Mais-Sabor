<?php
    require_once '../Model/Receita.Class.php';
    require_once '../Model/Ingrediente.Class.php';
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
                $this->setObj();
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
   
    //    var_dump($_REQUEST["materiais"]);
    //    var_dump($_REQUEST["gastos"]);
       $m=$_REQUEST["materiais"];
       $g=$_REQUEST["gastos"];
       $DAO = new  ReceitaDAO;
       $receita = new Receita;
        $ingrediente = new Ingrediente;
	   If (isset ($_REQUEST["idreceita"]))
	   {
            $receita-> setIdreceita($_REQUEST["idreceita"]);
            $receita-> setNome($_REQUEST["nome"]);
            $receita-> setValor_Receita($_REQUEST["valor_receita"]);
            $receita-> setDescricao($_REQUEST["descricao"]);
            $receita-> setLucro($_REQUEST["lucro"]);
            $receita-> setValor_Final($_REQUEST["valor_final"]);
            $receita-> setTbCategoria_nome_categoria($_REQUEST["tbCategoria_nome_categoria"]);
            $DAO->inserir($receita);
	   }else {
            $receita-> setNome($_REQUEST["nome"]);
            $receita-> setValor_Receita($_REQUEST["valor_receita"]);
            $receita-> setDescricao($_REQUEST["descricao"]);
            $receita-> setLucro($_REQUEST["lucro"]);
            $receita-> setValor_Final($_REQUEST["valor_final"]);
            $receita-> setTbCategoria_nome_categoria($_REQUEST["tbCategoria_nome_categoria"]);
            $idreceita=$DAO->inserir($receita);
            $materias= json_decode($m);
            $ms=count($materias);
            
            for($i=0;$i<$ms;$i++){
                print_r($materias[$i]);
                $ingrediente-> setNome($_REQUEST["nome"]);
                $ingrediente-> setValor_Receita($_REQUEST["valor_receita"]);
                $ingrediente-> setDescricao($_REQUEST["descricao"]);
                $ingrediente-> setLucro($_REQUEST["lucro"]);
            }
            
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