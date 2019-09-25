<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		 
		<link rel="shortcut icon" href="css/pao.ico" />
		<title>Programa Mais Sabor Teste</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/funcoes.js"></script>	
		
	</head>
	
	
	<?php
		session_start();
	if ( isset( $_SESSION['login']) && isset($_SESSION['senha'])  ) {
			echo'<body>
			<ul>	
				<li><a class="list" id="usu" onclick="selecao(1)" >Usuario</a></li>
				<li><a class="list" id="gastos" onclick="selecao(2)">Gasto</a></li>
				<li><a class="list" id="categoria" onclick="selecao(3)">Categoria</a></li>
				<li><a class="list" id="materiaprima" onclick="selecao(4)">Materia</a></li>
				<li><a class="list" id="receita" onclick="selecao(5)">Receita</a></li>
			</ul>
				<div class="top">
					<span class="titulo">Padaria Mais Sabor</span>';
				
					echo '
						<button id="Drop" onclick="Drop()" class="drop">'.$_SESSION['login'].'</button>
						
						';
				
				echo'</div>';
				echo'<div id="myDropdown" class="dropdown-content">
				<a class="list" onclick="login(4)">Perfil</a>
				<a class="list" onclick="login(3)" >Deslogar</a>
			</div>';
		} else {
			echo"<body onload='login(2)'>";
			
		}	
		
	?>
	<div class="conteudo" id="conteudo">
		  
	</div>
		
		
	</body>
</html>



	
				
				