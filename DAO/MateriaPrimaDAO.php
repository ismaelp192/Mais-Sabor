<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/MateriaPrima.Class.php';

//declaracacao da Classe DAO que irá persistir os objetos de usuario no banco.
class MateriaPrimaDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(MateriaPrima $materiaprima)
   {
		try{
			$stmt = $this->con->prepare('INSERT INTO tbMateria_prima (nome, data_validade, quantidade, preco, tipo_medida) VALUES (:nome, :data_validade, :quantidade, :preco, :tipo_medida)');
        	$stmt->execute(array(':nome'=> $materiaprima->getNome(),':data_validade'=> $materiaprima->getData_validade(),':quantidade'=> $materiaprima->getQuantidade(),':preco'=> $materiaprima->getPreco(),':tipo_medida'=> $materiaprima->getTipo_medida()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbMateria_prima');
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
		$stmt = $this->con->prepare('SELECT * FROM tbMateria_prima WHERE idmateria_prima='.$idmateria_prima);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
   function alterar(MateriaPrima $materiaprima){
		try{
			$stmt = $this->con->prepare('UPDATE tbMateria_prima SET nome = :nome, data_validade = :data_validade, quantidade = :quantidade, preco = :preco, tipo_medida = :tipo_medida WHERE idmateria_prima = :idmateria_prima');
			 $stmt->execute(array(':idmateria_prima'=>$materiaprima->getIdmateria_prima(),':nome'=> $materiaprima->getNome(),':data_validade'=> $materiaprima->getData_validade(),':quantidade'=> $materiaprima->getQuantidade(),':preco'=> $materiaprima->getPreco(),':tipo_medida'=> $materiaprima->getTipo_medida()));
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}	  
   }        
   
   function excluir($idmateria_prima){
		
	   try{
		$stmt = $this->con->prepare('DELETE FROM tbMateria_prima WHERE idmateria_prima =:idmateria_prima');
		$stmt->execute(array(':idmateria_prima'=>$idmateria_prima));
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>