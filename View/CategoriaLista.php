<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Categorias</title>
</head>
<body >
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
  $i=0.1;
      if((sizeof($lista))>0){
        foreach ($lista as $p){
          echo "<div class='col-2'>";
          echo "<table id='tab-".$p['idcategoria']."' onanimationend='anime2(this.id,3)' onanimationstart='anime(this.id)' style='animation-delay:".$i."s'; class='list_table_cat'>";
          echo "<tr><td align=center class='list_til' colspan=2><b>".$p["nome_categoria"]."</b><br><div  class='erro-msg' id='erro-".$p['idcategoria']."'></div></td></tr>";
          echo "<tr><td> <button onclick='categoria(3,".$p['idcategoria'].")' >Alterar</button></td><td><button onclick='categoria(4,".$p['idcategoria'].")'>Excluir</button></td></tr>";   
          echo "</table>";
          echo "</div>";
          $i+=0.4/sizeof($lista);
      }
    }
    echo "<div class='col-2'>";
    echo "<table  id='tab-x' onanimationstart='anime(this.id)' style='animation-delay:".$i."s'; onclick='categoria(1)' class='list_table_cat ghost'>";
    echo "<tr><td align=center ><img id='tab-2' src='img/plus.png'></td></tr>";
    echo "<tr><td class='list_til' align=center><b>Nova Categoria</b></td></tr>";
    echo "</table>";
    echo "</div>";


?> 
</body>
</html>