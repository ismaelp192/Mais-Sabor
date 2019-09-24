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

  require_once '../Controller/PHPFunction.php';
  require_once '../Controller/GastoExtraControl.php';
  $objGastos= new GastoExtraControl();
  $lista=$objGastos->listar();
  if((sizeof($lista))>0){
      foreach ($lista as $p){
        echo "<div class='list_list_gas'>";
        echo "<table class='list_table_gas'>";
        echo "<tr><td class='list_til' colspan=2><b>".$p["nome"]."</b></td></tr>";
        echo "<tr><td>Quantidade:</td><td>".get_numeric($p["quantidade"])."</td></tr>";
        echo "<tr><td>Tipo:</td><td>".$p["tipo_medida"]."</td></tr>";
        echo "<tr><td>Valor:</td><td>R$".get_numeric($p["valor"])."</td></tr>";
        echo "<tr><td><button onclick='gastos(3,".$p['idgastos_extras'].")'>Alterar</button></td><td><button onclick='gastos(4,".$p['idgastos_extras'].")'>Excluir</button> </td></tr>";   
        echo "</table>";
        echo "</div>";
    }
    echo "<div class='list_list_gas'>";
    echo "<button onclick='gastos(1)' id='plus_gas'></button>";
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