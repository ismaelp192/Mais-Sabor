<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Usuarios</title>
</head>
<body >
<center>
<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/UsuarioControl.php';
  
  //instanciando o objeto da classe ClienteControl
  echo "<button onclick='usu(1)' ><img src='img/plus.png'  width='20' height='20'></button>";
  $objUsuario= new UsuarioControl();
  $lista=$objUsuario->listar();
  //montagem da tabela com a lita de Usuarios
  if((sizeof($lista))>0){
    if((sizeof($lista))>1){
        $comp="s";
    }else{
        $comp="";
    }
      echo "<table style=text-align:center;>";
      echo "<tr><td colspan=6><b>Usuario".$comp."</b></td></tr>";
      echo "<tr><td>Foto</td><td>Nome</td><td>Login</td><td>Email</td><td>Tipo</td><td>Ações</td></tr>";
	  //recuperando os objetos da lista retornada pela controller
	  foreach ($lista as $p){
                  //recuperação do objeto e impressão na tabela
		  echo "<td><img width='40px' height='40px' src='".$p["image"]."'></td>";
          echo "<td>".$p["nome"]."</td>";
          echo "<td>".$p["login"]."</td>";
          echo "<td>".$p["email"]."</td>";
          echo "<td>".$p["tipo"]."</td>";
          echo "<td>
                 <button class='but' onclick='usu(3,".$p['idusuario'].")' >Alterar</button>
                 
                 <button class='but' onclick='usu(4,".$p['idusuario'].")'>Excluir</button>
               
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