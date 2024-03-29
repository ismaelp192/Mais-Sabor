<?php

//inclusão do arquivo com declaracao da Classe Conexao - conecta no MySql.
require_once 'Conexao.php';
require_once '../Model/Usuario.Class.php';
ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
//declaracacao da Classe DAO que irá persistir os objetos de usuario no banco.
class UsuarioDAO{
   
   private $con;
   
   function __construct()
   {
       $this->con=Conexao::conectar();  
   }
  
   function inserir(Usuario $usu)
   {
	   
		try{
			$stmt = $this->con->prepare('INSERT INTO tbusuario (nome, email, login, senha, tipo, image) VALUES (:nome, :email, :login, :senha, :tipo, :image)');
			$stmt->execute(array(':nome'=> $usu->getNome(),':email'=> $usu->getEmail(),':login'=> $usu->getlogin(),':senha'=> $usu->getSenha(),':tipo'=> $usu->getTipo(),':image'=> $usu->getImage()));
			return true;
		}
		 catch(PDOException $e){
			 echo "Error: ".$e->getMessage();
			 return false;
		 }
   }
   
   public function listar() {
	   try{
		$stmt = $this->con->prepare('SELECT * FROM tbusuario');
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   }
  
   public function listarPorId($idusuario){
	try{
		$stmt = $this->con->prepare('SELECT * FROM tbusuario WHERE idusuario ='.$idusuario);
		$stmt->execute();
		$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		return $result;
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
   } 
   
   function alterar(Usuario $usu){
		try{
			$stmt = $this->con->prepare('UPDATE tbusuario SET nome = :nome, email = :email, login = :login, tipo = :tipo, image = :image WHERE idusuario = :id');
			$stmt->execute(array(':id'=>$usu->getIdusuario(),':nome'=> $usu->getNome(),':email'=> $usu->getEmail(),':login'=> $usu->getlogin(),':tipo'=> $usu->getTipo(),':image'=> $usu->getImage()));
			if($_SESSION['idusuario'] == $usu->getIdusuario()){
				$_SESSION['login'] =$usu->getlogin();
				$_SESSION['tipo'] = $usu->getTipo();
				$_SESSION['email'] = $usu->getEmail();
				$_SESSION['nome'] = $usu->getNome();
				$_SESSION['image'] = $usu->getImage();
			}
			
			return true;
		}	
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
			return false;
		}	  
   }        
   
   function excluir($idusuario){
		
	   try{	
		$stmt = $this->con->prepare('DELETE FROM tbusuario WHERE idusuario =:id');
		$stmt->execute(array(':id'=>$idusuario));
	   }
	   catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
	}   

	function deslogar(){
		session_destroy();
		echo 0;
	}
	function login($login,$senha){

    if ( $login!=null &&  $senha!=null ) {
		try{
		$stmt = $this->con->prepare('SELECT * FROM tbusuario WHERE login=:login');
		$stmt->execute(array(':login'=>$login));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result==''){
			echo 2;
		}else{
			if ( password_verify($senha, $result['senha'])) {
				$_SESSION['login'] = $result['login'];
				$_SESSION['senha'] = $result['senha'];
				$_SESSION['tipo'] = $result['tipo'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['nome'] = $result['nome'];
				$_SESSION['image'] = $result['image'];
				$_SESSION['idusuario'] = $result['idusuario'];
				echo 0;
			}else{
				echo 1;
			}
		}
		 }catch(PDOException $e){
			 echo $e;
		 }
    }else{
			if ( $login==null &&  $senha==null ) {
				echo 3;
			}else if($login==null){
				echo 4;
			}else if($senha==null){
				echo 5;
			}
			
		}
	} 
	function recuEmail($email){
		try{
			$stmt = $this->con->prepare('SELECT * FROM tbusuario WHERE email ="'.$email.'"');
			$stmt->execute();
			$result = $stmt->SetFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetch();
			if ($result != null){
				$key = md5(microtime().rand());
				$to_email = 'ismaelp192@gmail.com';
				$subject = 'Testing PHP Mail';
				$message = 'oi';
				$headers = 'From: ismael270@live.com';
				if(mail($to_email,$subject,$message,$headers)){
					echo "yes";
				}else{
					echo "no";
				}
			}else{
				echo"no";
			}
			// return $result;
		}
		catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		
	}
}
?>