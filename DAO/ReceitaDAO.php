<?php
	require_once 'Conexao.php';
	require_once '../Model/Receita.Class.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	class ReceitaDAO{
   	private $con;

  	function __construct(){
	       $this->con=Conexao::conectar();
  	}

		function inserir(Receita $receita)
		{	
			try{
				$stmt = $this->con->prepare('INSERT INTO tbReceita (nome, valor_receita, descricao, lucro, valor_final,tbCategoria_idcategoria) VALUES (:nome, :valor_receita, :descricao, :lucro, :valor_final, :tbCategoria_idcategoria)');
				$stmt->execute(array(':nome'=> $receita->getNome(),':valor_receita'=> $receita->getValor_receita(),':descricao'=> $receita->getDescricao(),':lucro'=> $receita->getLucro(),':valor_final'=> $receita->getValor_final(),
			':tbCategoria_idcategoria'=>$receita->getTbCategoria_idcategoria()));
			 }
			 catch(PDOException $e){
				 echo "Error: ".$e->getMessage();
			 }
		}
		
		public function listar() {
			try{
				$stmt = $this->con->prepare('SELECT * FROM tbReceita');
				$stmt->execute();
				$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
				$result = $stmt->fetchAll();
				return $result;
					}
					catch(PDOException $e){
				echo "Error: ".$e->getMessage();
			}
		}

    public function listarPorId($idreceita){
			try{
				$stmt = $this->con->prepare('SELECT * FROM tbReceita WHERE idreceita ='.$idreceita);
				$stmt->execute();
				$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
				$result = $stmt->fetchAll();
				return $result;
			}
			catch(PDOException $e){
				echo "Error: ".$e->getMessage();
			}
		}

		function alterar(Receita $receita){
			try{
				$stmt = $this->con->prepare('UPDATE tbReceita SET nome = :nome, valor_receita = :valor_receita, descricao = :descricao, lucro = :lucro, valor_final = :valor_final, tbCategoria_idcategoria = :tbCategoria_idcategoria WHERE idreceita = :id');
				$stmt->execute(array(':id'=>$receita->getIdreceita(),':nome'=> $receita->getNome(),':valor_receita'=> $receita->getValor_receita(),':descricao'=> $receita->getDescricao(),':lucro'=> $receita->getLucro(),':valor_final'=> $receita->getValor_final(),
				':tbCategoria_idcategoria'=>$receita->getTbCategoria_idcategoria()));
				}	
				catch(PDOException $e){
					echo "Error: ".$e->getMessage();
				}	  
		}
		 
		function excluir($idreceita){
			try{
				$stmt = $this->con->prepare('DELETE FROM tbReceita WHERE idreceita =:id');
				$stmt->execute(array(':id'=>$idreceita));
			}
			catch(PDOException $e){
				echo "Error: ".$e->getMessage();
			}
		}
}
?>