<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Usuarios</title>
</head>
<body >
<?php
  require_once '../Controller/UsuarioControl.php';
  $objUsuario= new UsuarioControl();
  $lista=$objUsuario->listar();
  $i=0.1;
  if((sizeof($lista))>0){
	  foreach ($lista as $p){
      if($_SESSION["idusuario"]!=$p["idusuario"]){
        echo "<div class='col-3'>";
        echo "<table style='animation-delay:".$i."s; ' class='list_table_usu'>";
        echo "<tr><td align=center colspan=4><img id='tab-1' src='".$p["image"]."'></td></tr>";
        echo "<tr><td align=center colspan=4><b>".$p["nome"]."</b></td></tr>";
        echo "<tr><td><b>Login:</b></td><td colspan=3>".$p["login"]."</td></tr>";
        echo "<tr><td><b>Email:</b></td><td colspan=3>".$p["email"]."</td></tr>";
        echo "<tr><td><b>Tipo:</b></td><td colspan=3>".$p["tipo"]."</td></tr>";
        echo "<tr><td colspan=2><button class='but' onclick='usu(3,".$p['idusuario'].", 2)' >Alterar</button></td><td colspan=2><button class='but exi' onclick='usu(4,".$p['idusuario'].")'>Excluir</button></td></tr>";   
        echo "</table>";
        echo "</div>";
      $i+=0.9/sizeof($lista);
      }
    }  
  }
    echo "<div class='col-3'>";
    echo "<table style='animation-delay:".$i."s; ' class='list_table_usu ghost' onclick='usu(1)'>";
    echo "<tr><td align=center colspan=4><img id='tab-1' src='img/plus.png'></td></tr>";
    echo "<tr><td align=center colspan=4><b>Novo Usuário</b></td></tr>";
    echo "</table>";
    echo "</div>";

?> 

</body>
</html>


