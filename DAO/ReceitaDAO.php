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
				$stmt2 = $this->con->prepare('SELECT idcategoria FROM tbCategoria WHERE nome_categoria ="'.$receita->getTbCategoria_nome_categoria().'"');
				$stmt2->execute();
				$result2 = $stmt2->SetFetchMode(PDO::FETCH_ASSOC);
				$result2 = $stmt2->fetchAll();
				$receita->setTbCategoria_idcategoria($result2[0]["idcategoria"]);
				$stmt = $this->con->prepare('INSERT INTO tbReceita (nome, valor_receita, descricao, lucro, valor_final,tbCategoria_idcategoria, image) VALUES (:nome, :valor_receita, :descricao, :lucro, :valor_final, :tbCategoria_idcategoria, :image)');
				$stmt->execute(array(':nome'=> $receita->getNome(),':valor_receita'=> $receita->getValor_receita(),':descricao'=> $receita->getDescricao(),':lucro'=> $receita->getLucro(),':valor_final'=> $receita->getValor_final(),
				':tbCategoria_idcategoria'=>$receita->getTbCategoria_idcategoria(),':image'=>$receita->getImage()));
				$last_id=$this->con->lastInsertId();
				return $last_id;
			 }
			 catch(PDOException $e){
				 echo "Error: ".$e->getMessage();
			 }
		}
		function alterar(Receita $receita){
			try{
				$stmt2 = $this->con->prepare('SELECT idcategoria FROM tbCategoria WHERE nome_categoria ="'.$receita->getTbCategoria_nome_categoria().'"');
				$stmt2->execute();
				$result2 = $stmt2->SetFetchMode(PDO::FETCH_ASSOC);
				$result2 = $stmt2->fetchAll();
				$receita->setTbCategoria_idcategoria($result2[0]["idcategoria"]);
				$stmt = $this->con->prepare('UPDATE tbReceita SET nome = :nome, valor_receita = :valor_receita, descricao = :descricao, lucro = :lucro, valor_final = :valor_final, tbCategoria_idcategoria = :tbCategoria_idcategoria, image = :image WHERE idreceita = :id');
				$stmt->execute(array(':id'=>$receita->getIdreceita(),':nome'=> $receita->getNome(),':valor_receita'=> $receita->getValor_receita(),':descricao'=> $receita->getDescricao(),':lucro'=> $receita->getLucro(),':valor_final'=> $receita->getValor_final(),
				':tbCategoria_idcategoria'=>$receita->getTbCategoria_idcategoria(),':image'=>$receita->getImage()));
				
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
				$stmt2 = $this->con->prepare('SELECT nome_categoria, idcategoria FROM tbCategoria INNER JOIN tbReceita on idcategoria = tbCategoria_idcategoria');
				$stmt2->execute();
				$result2 = $stmt2->SetFetchMode(PDO::FETCH_ASSOC);
				$result2 = $stmt2->fetchAll();
				$i=0;
				$o=0;
				for($i=0; $i<count($result); $i++){
					for($o=0; $o<count($result2); $o++){
						if($result[$i]["tbCategoria_idcategoria"]== $result2[$o]["idcategoria"]){
							$result[$i]["tbCategoria_idcategoria"]= $result2[$o]["nome_categoria"];
						}
					}
				}
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