<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/Ingrediente.Class.php';

//declaracacao da Classe DAO que irá persistir os objetos de usuario no banco.
class IngredienteDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(Ingrediente $ingrediente)
   {
		try{
			$stmt = $this->con->prepare('INSERT INTO tbIngrediente(tbMateria_prima_idmateria_prima, tbReceita_idreceita, quantidade, preco) VALUES (:tbMateria_prima_idmateria_prima,:tbReceita_idreceita,:quantidade,:preco)');
        	$stmt->execute(array(':tbMateria_prima_idmateria_prima'=> $ingrediente->getTbMateria_prima_idmateria_prima(),':tbReceita_idreceita'=> $ingrediente->getTbReceita_idreceita(),':quantidade'=> $ingrediente->getQuantidade(),':preco'=> $ingrediente->getPreco()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbIngrediente');
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }
  
   public function listarPorId($idmateria_prima){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbIngrediente WHERE idmateria_prima='.$idmateria_prima);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
   function alterar(Ingrediente $ingrediente){
		try{
			$stmt = $this->con->prepare('UPDATE tbIngrediente SET nome = :nome, data_validade = :data_validade, quantidade = :quantidade, preco = :preco, =  WHERE idmateria_prima = :idmateria_prima');
			 $stmt->execute(array(':idmateria_prima'=>$ingrediente->getIdmateria_prima(),':nome'=> $ingrediente->getNome(),':data_validade'=> $ingrediente->getData_validade(),':quantidade'=> $ingrediente->getQuantidade(),':preco'=> $ingrediente->getPreco(),''=> $ingrediente->getTipo_medida()));
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}	  
   }        
   
   function excluir($idmateria_prima){
		
	   try{
		$stmt = $this->con->prepare('DELETE FROM tbIngrediente WHERE idmateria_prima =:idmateria_prima');
		$stmt->execute(array(':idmateria_prima'=>$idmateria_prima));
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>