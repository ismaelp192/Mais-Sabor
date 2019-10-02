<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		 
		<link rel="shortcut icon" href="css/pao.ico" />
		<title>Programa Mais Sabor Teste</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/funcoes.js"></script>	
		
	</head>
	
	<body>
	<?php
		session_start();
	if ( isset( $_SESSION['login']) && isset($_SESSION['senha'])  ) {
			echo'
				<div class="header">
					<span class="titulo">Padaria Mais Sabor</span>';
				
					echo '
						<button id="Drop" onclick="Drop()" class="drop">'.$_SESSION['login'].'</button>
						
						';
				
				echo'</div>';
				
			echo'<div class="row">
				<div class="col-1 menu"><ul>	
				<li class="list" id="usu" onclick="selecao(1)">Usuario</li>
				<li class="list" id="gastos" onclick="selecao(2)">Gasto</li>
				<li class="list" id="categoria" onclick="selecao(3)">Categoria</li>
				<li class="list" id="materiaprima" onclick="selecao(4)">Materia</li>
				<li class="list" id="receita" onclick="selecao(5)">Receita</li>
				</ul></div>
			<div class="col-11 conteudo" id="conteudo">
			</div>
			<div id="myDropdown" class=" col-1 dropdown-content">
				<a class="list" onclick="login(4)">Perfil</a>
				<a class="list" onclick="login(3)" >Deslogar</a>
			</div>
			</div>';
		} else {
			echo"<body onload='login(2)'>
			<div class='col-11 conteudo' id='conteudo'>
			</div>";	
		}	
		
	?>
	
		
		
	</body>
</html>



	
				
				