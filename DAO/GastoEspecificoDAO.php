<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/GastoEspecifico.Class.php';

//declaracacao da Classe DAO que irá persistir os objetos de usuario no banco.
class GastoEspecificoDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(GastoEspecifico $gastoespecifico)
   {
		try{
			$stmt = $this->con->prepare('INSERT INTO tbreceita_has_tbgastos_extras(tbGastos_extras_idgastos_extras, tbReceita_idreceita, quantidade, preco_gasto_extra) VALUES (:tbGastos_extras_idgastos_extras,:tbReceita_idreceita,:quantidade,:preco_gasto_extra)');
        	$stmt->execute(array(':tbGastos_extras_idgastos_extras'=> $gastoespecifico->getTbGastos_extras_idgastos_extras(),':tbReceita_idreceita'=> $gastoespecifico->getTbReceita_idreceita(),':quantidade'=> $gastoespecifico->getQuantidade(),':preco_gasto_extra'=> $gastoespecifico->getPreco_gasto_extra()));
		 }
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
		 }
   }
   
//    public function listar() {
// 	   try{
// 		$stmt = $this->con->prepare('SELECT * FROM tbReceita_has_tbMateria_Prima');
// 		$stmt->execute();
// 		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
// 		$result = $stmt->fetchAll();
// 		return $result;
// 	   }
// 	   catch(PDOException $e){
// 		echo "Error: ".$e->getMessage();
// 	}
//    }
  
   public function listarPorId($idreceita){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbreceita_has_tbgastos_extras WHERE  tbReceita_idreceita='.$idreceita);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
//    function alterar(GastoEspecifico $GastoEspecifico){
// 		try{
// 			$stmt = $this->con->prepare('UPDATE tbReceita_has_tbMateria_Prima SET nome = :nome, data_validade = :data_validade, quantidade = :quantidade, preco_gasto_extra = :preco_gasto_extra, =  WHERE idmateria_prima = :idmateria_prima');
// 			 $stmt->execute(array(':idmateria_prima'=>$GastoEspecifico->getIdmateria_prima(),':nome'=> $GastoEspecifico->getNome(),':data_validade'=> $GastoEspecifico->getData_validade(),':quantidade'=> $GastoEspecifico->getQuantidade(),':preco_gasto_extra'=> $GastoEspecifico->getPreco(),''=> $GastoEspecifico->getTipo_medida()));
// 		}	
// 		catch(PDOException $e){
// 			echo "Error: ".$e->getMessage();
// 		}	  
//    }        
   
   function excluir($idreceita){
		
	   try{
		$stmt = $this->con->prepare('DELETE FROM tbreceita_has_tbgastos_extras WHERE tbReceita_idreceita =:idreceita');
		$stmt->execute(array(':idreceita'=>$idreceita));
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }   
   
}

?>