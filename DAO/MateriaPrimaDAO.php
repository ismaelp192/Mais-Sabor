<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/MateriaPrima.Class.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
			$stmt = $this->con->prepare('INSERT INTO tbmateria_prima (nome, data_validade, quantidade, preco, tipo_medida) VALUES (:nome, :data_validade, :quantidade, :preco, :tipo_medida)');
        	$stmt->execute(array(':nome'=> $materiaprima->getNome(),':data_validade'=> $materiaprima->getData_validade(),':quantidade'=> $materiaprima->getQuantidade(),':preco'=> $materiaprima->getPreco(),':tipo_medida'=> $materiaprima->getTipo_medida()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbmateria_prima');
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		// var_dump($result);
		return $result;
		
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }
  
   public function listarPorId($idmateria_prima){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbmateria_prima WHERE idmateria_prima='.$idmateria_prima);
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
			$stmt = $this->con->prepare('UPDATE tbmateria_prima SET nome = :nome, data_validade = :data_validade, quantidade = :quantidade, preco = :preco, tipo_medida = :tipo_medida WHERE idmateria_prima = :idmateria_prima');
			 $stmt->execute(array(':idmateria_prima'=>$materiaprima->getIdmateria_prima(),':nome'=> $materiaprima->getNome(),':data_validade'=> $materiaprima->getData_validade(),':quantidade'=> $materiaprima->getQuantidade(),':preco'=> $materiaprima->getPreco(),':tipo_medida'=> $materiaprima->getTipo_medida()));
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}	  
   }        
   
   function excluir($idmateria_prima){
	
		
	   try{
		$stmt2 = $this->con->prepare('SELECT tbMateria_prima_idmateria_prima FROM tbreceita_has_tbmateria_prima WHERE tbMateria_prima_idmateria_prima =:id');
		$stmt2->execute(array(':id'=>$idmateria_prima));
		$result2 = $stmt2->SetFetchMode(PDO::FETCH_ASSOC);
		$result2 = $stmt2->fetchAll();
		if(isset($result2[0]["tbMateria_prima_idmateria_prima"])){
			echo 0;
		}else{
			$stmt = $this->con->prepare('DELETE FROM tbmateria_prima WHERE idmateria_prima =:idmateria_prima');
			$stmt->execute(array(':idmateria_prima'=>$idmateria_prima));
			echo 1;
		}
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>