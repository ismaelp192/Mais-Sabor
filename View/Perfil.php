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
      echo "<table style=text-align:center;>";
      echo "<tr><td colspan=6><b>Usuario</b></td></tr>";
      echo "<tr><td>Nome</td><td>Login</td><td>Email</td><td>Tipo</td></tr>";
	  //recuperando os objetos da lista retornada pela controller
                  //recuperação do objeto e impressão na tabela
          echo "<td>".$_SESSION['nome']."</td>";
          echo "<td>".$_SESSION['login']."</td>";
          echo "<td>".$_SESSION['email']."</td>";
          echo "<td>".$_SESSION['tipo']."</td>";
          echo "</tr>";            
     
      
      echo "</table>";
?> 
</center>
</body>
</html>