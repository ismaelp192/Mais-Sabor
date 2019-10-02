<?php

require_once 'Conexao.php';
require_once '../Model/GastoExtra.Class.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
class GastoExtraDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(GastoExtra $gas)
   {
		try{
			$stmt = $this->con->prepare('INSERT INTO tbgastos_extras (nome, quantidade, valor, tipo_medida) VALUES (:nome, :quantidade, :valor, :tipo_medida)');
        	$stmt->execute(array(':nome'=> $gas->getNome(),':quantidade'=> $gas->getQuantidade(),':valor'=> $gas->getValor(),':tipo_medida'=> $gas->getTipo_medida()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbgastos_extras');
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }
  
   public function listarPorId($idgastos_extras){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbgastos_extras WHERE idgastos_extras ='.$idgastos_extras);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
   function alterar(GastoExtra $gas){
		try{
			$stmt = $this->con->prepare('UPDATE tbgastos_extras SET nome = :nome, quantidade = :quantidade, valor = :valor,tipo_medida = :tipo_medida WHERE idgastos_extras = :id');
			 $stmt->execute(array(':id'=>$gas->getIdgastos_extras(),':nome'=> $gas->getNome(),':quantidade'=> $gas->getQuantidade(),':valor'=> $gas->getValor(),':tipo_medida'=> $gas->getTipo_medida()));
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}	  
   }        
   
   function excluir($idgastos_extras){
	   try{
		$stmt2 = $this->con->prepare('SELECT tbGastos_extras_idgastos_extras FROM tbreceita_has_tbgastos_extras WHERE tbGastos_extras_idgastos_extras =:id');
		$stmt2->execute(array(':id'=>$idgastos_extras));
		$result2 = $stmt2->SetFetchMode(PDO::FETCH_ASSOC);
		$result2 = $stmt2->fetchAll();
		if(isset($result2[0]["tbGastos_extras_idgastos_extras"])){
			echo 0;
		}else{
			$stmt = $this->con->prepare('DELETE FROM tbgastos_extras WHERE idgastos_extras =:id');
			$stmt->execute(array(':id'=>$idgastos_extras));
			echo 1;
		}
		
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>