
<?php
class Conexao{
   static function conectar(){
    $host="localhost";
    $user="root";
    $password="bancodedados";//bancodedados
    $banco="maissabor";
    try{
      $con = new PDO("mysql:host=$host;dbname=$banco",$user,$password); 
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $con;
   }
   catch(PDOException $e){
       echo "Error: ".$e->getMessage();
   }

   
   }
 }

?>
