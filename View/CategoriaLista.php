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
  $objCategoria= new CategoriaControl();
  $lista=$objCategoria->listar();
  //montagem da tabela com a lita de Usuarios

      if((sizeof($lista))>0){
        foreach ($lista as $p){
          echo "<div class='list_list_cat'>";
          echo "<table class='list_table_cat'>";
          echo "<tr><td class='list_til' colspan=2><b>".$p["nome_categoria"]."</b></td></tr>";
          echo "<tr><td> <button onclick='categoria(3,".$p['idcategoria'].")' >Alterar</button></td><td><button onclick='categoria(4,".$p['idcategoria'].")'>Excluir</button></td></tr>";   
          echo "</table>";
          echo "</div>";
      }
      echo "<div class='list_list_cat'>";
      echo "<button onclick='categoria(1)' id='plus_cat'></button>";
      echo "</div>";
    }
      
  
  else
  {
    echo "<div class='list_list_cat'>";
    echo "<button onclick='categoria(1)' id='plus_cat'></button>";
    echo "</div>";
  }

?> 
</center>
</body>
</html>