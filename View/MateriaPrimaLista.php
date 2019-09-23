<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Lista de Matéria Prima</title>
</head>
<body >
<center>

<?php
  //incluindo a declaracao da classe ClienteControl
  require_once '../Controller/MateriaPrimaControl.php';
  require_once '../Controller/PHPFunction.php';

  //instanciando o objeto da classe ClienteControl
  echo "<button onclick='materiaprima(1)'><img src='img/plus.png'  width='20' height='20'></button>";
  $objMateria_prima= new MateriaPrimaControl();
  $lista=$objMateria_prima->listar();
  //montagem da tabela com a lita de Usuarios
  if((sizeof($lista))>0){
        if((sizeof($lista))>1){
            $comp="s";
        }else{
            $comp="";
        }
      echo "<table style=text-align:center;> ";
      echo "<tr><td colspan=7><b>Materia".$comp."</b></td></tr>";
      echo "<tr><td>ID</td><td>Nome</td><td>Data de Validade</td><td>Quantidade</td><td>Tipo de Medida</td><td>Preço</td><td>Ações</td></tr>";
	  //recuperando os objetos da lista retornada pela controller
	  foreach ($lista as $p){
        $p["data_validade"] = implode("/",array_reverse(explode("-",$p["data_validade"])));
                  //recuperação do objeto e impressão na tabela
		  echo "<td>".$p["idmateria_prima"]."</td>";
          echo "<td>".$p["nome"]."</td>";
          echo "<td>".$p["data_validade"]."</td>";
          echo "<td>".get_numeric($p["quantidade"])."</td>";
          echo "<td>".$p["tipo_medida"]."</td>";
          echo "<td>R$".get_numeric($p["preco"])."</td>";
          echo "<td>
                 <button onclick='materiaprima(3,".$p['idmateria_prima'].")' >Alterar</button>
                 
                 <button onclick='materiaprima(4,".$p['idmateria_prima'].")'>Excluir</button>
               
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