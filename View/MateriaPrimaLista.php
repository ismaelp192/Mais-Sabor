<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Matéria Prima</title>
</head>
<body >

<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/MateriaPrimaControl.php';
  require_once '../Controller/PHPFunction.php';

  //instanciando o objeto da classe ClienteControl
  $objMateria_prima= new MateriaPrimaControl();
  $lista=$objMateria_prima->listar();
  //montagem da tabela com a lita de Usuarios

  $i=0.1;
      if((sizeof($lista))>0){
        foreach ($lista as $p){
          $p["data_validade"] = implode("/",array_reverse(explode("-",$p["data_validade"])));
          echo "<div class='col-2'>";
          echo "<table id='tab-".$p['idmateria_prima']."' onanimationend='anime2(this.id,4)' onanimationstart='anime(this.id)' style='animation-delay:".$i."s';  class='list_table_mat'>";
          echo "<tr><td class='list_til' colspan=2><b>".$p["nome"]."</b><br><div class='erro-msg' id='erro-".$p['idmateria_prima']."'></div></td></tr>";
          echo "<tr><td>Data de Validade:</td><td>".$p["data_validade"]."</td></tr>";
          echo "<tr><td>Quantidade:</td><td>".get_numeric($p["quantidade"])."</td></tr>";
          echo "<tr><td>Tipo:</td><td>".$p["tipo_medida"]."</td></tr>";
          echo "<tr><td>Preço:</td><td>R$".get_numeric($p["preco"])."</td></tr>";
          echo "<tr><td><button onclick='materiaprima(3,".$p['idmateria_prima'].")' >Alterar</button></td><td> <button onclick='materiaprima(4,".$p['idmateria_prima'].")'>Excluir</button></td></tr>";   
          echo "</table>";
          echo "</div>";
          $i+=0.4/sizeof($lista);
      }
    }
    echo "<div class='col-2'>";
    echo "<table id='tab-x' onanimationstart='anime(this.id)' style='animation-delay:".$i."s'; onclick='materiaprima(1)' class='list_table_mat ghost'>";
    echo "<tr><td align=center ><img id='tab-1' src='img/plus.png'></td></tr>";
    echo "<tr><td align=center  class='list_til'><b>Nova Materia Prima</b></td></tr>";
    echo "</table>";
    echo "</div>";
?> 
</body>
</html>