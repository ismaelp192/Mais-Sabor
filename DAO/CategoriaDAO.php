<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/Categoria.Class.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//declaracacao da Classe DAO que irá persistir os objetos de usuario no banco.
class CategoriaDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(Categoria $categoria)
   {
		try{
			$stmt = $this->con->prepare('INSERT INTO tbCategoria (nome_categoria) VALUES (:nome_categoria)');
        	$stmt->execute(array(':nome_categoria'=> $categoria->getNome_categoria()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbCategoria');
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }
  
   public function listarPorId($idcategoria){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbCategoria WHERE idcategoria ='.$idcategoria);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
   function alterar(Categoria $categoria){
		try{
			$stmt = $this->con->prepare('UPDATE tbCategoria SET nome_categoria = :nome_categoria WHERE idcategoria = :idcategoria');
			 $stmt->execute(array(':idcategoria'=>$categoria->getIdcategoria(),':nome_categoria'=> $categoria->getNome_categoria()));
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}	  
   }        
   
   function excluir($idcategoria){
		
	   try{
		$stmt = $this->con->prepare('DELETE FROM tbCategoria WHERE idcategoria =:idcategoria');
		$stmt->execute(array(':idcategoria'=>$idcategoria));
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>