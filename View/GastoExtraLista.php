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
        echo "<div class='col-2'>";
        echo "<table id='tab-".$p['idgastos_extras']."' class='list_table_gas'>";
        echo "<tr><td class='list_til' align=center colspan=4><b>".$p["nome"]."</b><br><div class='erro-msg' id='erro-".$p['idgastos_extras']."'></div></td></tr>";
        echo "<tr><td colspan=2>Quantidade:</td><td colspan=2>".get_numeric($p["quantidade"])."</td></tr>";
        echo "<tr><td colspan=2>Tipo:</td><td  colspan=2>".$p["tipo_medida"]."</td></tr>";
        echo "<tr><td colspan=2>Valor:</td><td  colspan=2>R$".get_numeric($p["valor"])."</td></tr>";
        echo "<tr><td colspan=2><button onclick='gastos(3,".$p['idgastos_extras'].")'>Alterar</button></td><td colspan=2><button class='but exi' onclick='gastos(4,".$p['idgastos_extras'].")'>Excluir</button> </td></tr>";   
        echo "</table>";
        echo "</div>";
    }
        echo "<div class='col-2'>";
        echo "<table id='tab-".$p['idgastos_extras']."' onclick='gastos(1)' class='list_table_gas ghost'>";
        echo "<tr><td align=center colspan=4><img id='tab' src='img/plus.png'></td></tr>";
        echo "<tr><td class='list_til' align=center colspan=4><b>Novo Gasto</b></td></tr>";
        // echo "<tr><td>Quantidade:</td><td></td></tr>";
        // echo "<tr><td>Tipo:</td><td></td></tr>";
        // echo "<tr><td>Valor:</td><td></td></tr>";
        echo "</table>";
        echo "</div>";
  }
  else
  {
    echo "<div class='col-2'>";
    echo "<table id='tab-".$p['idgastos_extras']."' onclick='gastos(1)' class='list_table_gas ghost'>";
    echo "<tr><td align=center colspan=4><img id='tab' src='img/plus.png'></td></tr>";
    echo "<tr><td class='list_til' align=center colspan=4><b>Novo Gasto</b></td></tr>";
    // echo "<tr><td>Quantidade:</td><td></td></tr>";
    // echo "<tr><td>Tipo:</td><td></td></tr>";
    // echo "<tr><td>Valor:</td><td></td></tr>";
    echo "</table>";
    echo "</div>";
  }

?> 
</center>
</body>
</html>