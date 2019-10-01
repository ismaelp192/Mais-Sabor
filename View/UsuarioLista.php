<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Usuarios</title>
</head>
<body >
<center>
<?php
  require_once '../Controller/UsuarioControl.php';
  $objUsuario= new UsuarioControl();
  $lista=$objUsuario->listar();
  if((sizeof($lista))>0){
	  foreach ($lista as $p){
          echo "<div class='list_list_usu'>";
          echo "<table class='list_table_usu'>";
          echo "<tr><td align=center colspan=2><img id='tab' src='".$p["image"]."'></td></tr>";
          echo "<tr><td align=center colspan=2><b>".$p["nome"]."</b></td></tr>";
          echo "<tr><td><b>Login:</b></td><td>".$p["login"]."</td></tr>";
          echo "<tr><td><b>Email:</b></td><td>".$p["email"]."</td></tr>";
          echo "<tr><td><b>Tipo:</b></td><td>".$p["tipo"]."</td></tr>";
          echo "<tr><td><button class='but' onclick='usu(3,".$p['idusuario'].")' >Alterar</button></td><td><button class='but' onclick='usu(4,".$p['idusuario'].")'>Excluir</button></td></tr>";   
          echo "</table>";
          echo "</div>";
      }
      echo "<div class='list_list_usu'>";
      echo "<button onclick='usu(1)' id='plus_usu'></button>";
      echo "</div>";
      
  }
  else
  {
    echo "<div class='list_list_usu'>";
    echo "<button onclick='usu(1)' id='plus_usu'></button>";
    echo "</div>";
  }

?> 
</center>
</body>
</html>


