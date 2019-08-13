<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Lista de Gasto extras</title>
</head>
<body >
<center>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once '../Controller/GastoExtraControl.php';
  //instanciando o objeto da classe ClienteControl
  echo "<button onclick='gastos(1)' >New</button>";
  $objGastos= new GastoExtraControl();
  $lista=$objGastos->listar();
  //montagem da tabela com a lita de Gastoss
  if((sizeof($lista))>0){
    if((sizeof($lista))>1){
        $comp="s";
    }else{
        $comp="";
    }
      echo "<table style=text-align:center;>";
      echo "<tr><td colspan=6><b>Gasto".$comp."</b></td></tr>";
      echo "<tr ><td>id</td><td>Nome</td><td>Quantidade</td><td>Tipo medida</td><td>Valor</td><td>Ações</td></tr>";
	  //recuperando os objetos da lista retornada pela controller
	  foreach ($lista as $p){
                  //recuperação do objeto e impressão na tabela
		  echo "<td>".$p["idgastos_extras"]."</td>";
          echo "<td>".$p["nome"]."</td>";
          echo "<td>".$p["quantidade"]."</td>";
          echo "<td>".$p["tipo_medida"]."</td>";
          echo "<td>".$p["valor"]."R$</td>";
          echo "<td>
                 <button onclick='gastos(3,".$p['idgastos_extras'].")'>Alterar</button>
                 <button onclick='gastos(4,".$p['idgastos_extras'].")'>Excluir</button> 
                 </td></tr>";            
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