<?php
    require_once '../Model/Receita.Class.php';
    require_once '../Model/Ingrediente.Class.php';
    require_once '../Model/GastoEspecifico.Class.php';
    require_once '../DAO/GastoEspecificoDAO.php';
    require_once '../DAO/ReceitaDAO.php';
    require_once '../DAO/IngredienteDAO.php';
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
                $this->setObj();
                    break;
                case 3:
                $DAO = new  ReceitaDAO;
                $DAO->excluir($_REQUEST["idreceita"]);
                    break;
                
            }
        }

        private function setObj()
   {
       $m=$_REQUEST["materiais"];
       $g=$_REQUEST["gastos"];
       $DAO = new  ReceitaDAO;
       $DAOI = new  IngredienteDAO;
       $DAOG = new GastoEspecificoDAO;
       $receita = new Receita;
       $ingrediente = new Ingrediente;
       $gastos_e = new GastoEspecifico;
       $materias= json_decode($m);
       $ms=count($materias);
       $gastos= json_decode($g);
       $gs=count($gastos); 

       $receita-> setNome($_REQUEST["nome"]);
       $receita-> setValor_Receita($_REQUEST["valor_receita"]);
       $receita-> setPreparo($_REQUEST["preparo"]);
       $receita-> setLucro($_REQUEST["lucro"]);
       $receita-> setValor_Final($_REQUEST["valor_final"]);
       $receita-> setTbCategoria_nome_categoria($_REQUEST["tbCategoria_nome_categoria"]);
       echo $_REQUEST["preparo"];
       //--------------------------------------------
       $deish=false;
       var_dump($_POST);
       if(sizeof($_FILES)>0){
        $file=$_FILES["files"];
        $fname=$file["name"];
        $receita->setImage("rec_img/".$fname);
        $deish=true;
    }else if(isset($_REQUEST["image"])){
        var_dump($_REQUEST["image"]);
        $receita->setImage($_REQUEST["image"]);
    }else{
        $receita->setImage("rec_img/default_rec.png");  
    }
    //-------------------------------------------------------------
	   If (isset ($_REQUEST["idreceita"]))
	   {
            $receita-> setIdreceita($_REQUEST["idreceita"]);
            $DAO->alterar($receita);
            $idreceita=$_REQUEST["idreceita"];
            $DAOI->excluir($idreceita);
            $DAOG->excluir($idreceita); 
	   }else { 
            $idreceita=$DAO->inserir($receita);
       }
        for($i=0;$i<$ms;$i++){
            $ingrediente-> setTbMateria_prima_idmateria_prima($materias[$i]->id);
            $ingrediente-> setTbReceita_idreceita($idreceita);
            $ingrediente-> setQuantidade($materias[$i]->quantidade);
            $ingrediente-> setPreco($materias[$i]->valor);
            $DAOI->inserir($ingrediente);
        }
        for($i=0;$i<$gs;$i++){
            $gastos_e-> setTbGastos_extras_idgastos_extras($gastos[$i]->id);
            $gastos_e-> setTbReceita_idreceita($idreceita);
            $gastos_e-> setQuantidade($gastos[$i]->quantidade);
            $gastos_e-> setPreco_gasto_extra($gastos[$i]->valor);
            $DAOG->inserir($gastos_e);
        }
        if($deish==true){
            if(move_uploaded_file($file["tmp_name"], "../rec_img/" . $file["name"])){
            }else{
                echo "<h3>Erro, o arquivo não pode ser enviado:</h3><br>";
                echo "O ARQUIVO SUPERA O LIMITE DE TAMANHO PERMITIDO, ADICIONE UMA FOTO MENOR <br>";
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