<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Perfil</title>
</head>
<body >
<center>
<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/UsuarioControl.php';
  
  //instanciando o objeto da classe ClienteControl
  //montagem da tabela com a lita de Usuarios
        echo "<table class='list_table_profile'>";
        echo "<tr><td align=center colspan=4><img id='tab-1' src='".$_SESSION["image"]."'></td></tr>";
        echo "<tr><td align=center colspan=4><b>".$_SESSION["nome"]."</b></td></tr>";
        echo "<tr><td><b>Login:</b></td><td colspan=3>".$_SESSION["login"]."</td></tr>";
        echo "<tr><td><b>Email:</b></td><td colspan=3>".$_SESSION["email"]."</td></tr>";
        echo "<tr><td><b>Tipo:</b></td><td colspan=3>".$_SESSION["tipo"]."</td></tr>";
        echo "<tr><td colspan=2><button class='but' onclick='usu(3,".$_SESSION['idusuario'].", 4)' >Alterar</button></td><td colspan=2><button class='but exi' onclick='usu(4,".$_SESSION['idusuario'].")'>Excluir</button></td></tr>";   
        echo "</table>";
?> 
</center>
</body>
</html>