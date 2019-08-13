<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Categorias</title>
</head>
<body >
<center>
<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/CategoriaControl.php';
  ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
  //instanciando o objeto da classe ClienteControl
  echo "<button onclick='categoria(1)' >New</button>";
  $objCategoria= new CategoriaControl();
  $lista=$objCategoria->listar();
  //montagem da tabela com a lita de Usuarios
  if((sizeof($lista))>0){
    if((sizeof($lista))>1){
      $comp="s";
  }else{
      $comp="";
  }
    echo "<table  style=text-align:center;>";
    echo "<tr><td colspan=3><b>Categoria".$comp."</b></td></tr>";
    echo "<tr><td>ID</td><td>Nome</td><td>Ações</td></tr>";

	  //recuperando os objetos da lista retornada pela controller
	  foreach ($lista as $p){
                  //recuperação do objeto e impressão na tabela
		  echo "<td>".$p["idcategoria"]."</td>";
          echo "<td>".$p["nome_categoria"]."</td>";
          echo "<td>
                 <button onclick='categoria(3,".$p['idcategoria'].")' >Alterar</button>
                 <button onclick='categoria(4,".$p['idcategoria'].")'>Excluir</button>  
                 </td></tr>";
        //   echo "<hr>";                   
      }
      
      echo "</table>";
  }
  else
  {
      echo "não há registros no banco de dados";
  }

?> 
</center>
</body>
</html>