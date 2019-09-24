<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Matéria Prima</title>
</head>
<body >
<center>

<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/MateriaPrimaControl.php';
  require_once '../Controller/PHPFunction.php';

  //instanciando o objeto da classe ClienteControl
  $objMateria_prima= new MateriaPrimaControl();
  $lista=$objMateria_prima->listar();
  //montagem da tabela com a lita de Usuarios


      if((sizeof($lista))>0){
        foreach ($lista as $p){
          $p["data_validade"] = implode("/",array_reverse(explode("-",$p["data_validade"])));
          echo "<div class='list_list_mat'>";
          echo "<table class='list_table_mat'>";
          echo "<tr><td class='list_til' colspan=2><b>".$p["nome"]."</b></td></tr>";
          echo "<tr><td>Data de Validade:</td><td>".$p["data_validade"]."</td></tr>";
          echo "<tr><td>Quantidade:</td><td>".get_numeric($p["quantidade"])."</td></tr>";
          echo "<tr><td>Tipo:</td><td>".$p["tipo_medida"]."</td></tr>";
          echo "<tr><td>Preço:</td><td>R$".get_numeric($p["preco"])."</td></tr>";
          echo "<tr><td><button onclick='materiaprima(3,".$p['idmateria_prima'].")' >Alterar</button></td><td> <button onclick='materiaprima(4,".$p['idmateria_prima'].")'>Excluir</button></td></tr>";   
          echo "</table>";
          echo "</div>";
      }
      echo "<div class='list_list_mat'>";
      echo "<button onclick='materiaprima(1)' id='plus_gas'></button>";
      echo "</div>";
    }
  
  else
  {
      echo "não há registros no banco de dados";
  }

?> 
</center>
</body>
</html>