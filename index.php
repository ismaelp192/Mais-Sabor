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
			
				<div class="header col-12">
					<div class="col-1">
						<center>
						<img class="menu-img" src="css/pao.ico">
						</center>
					</div>
					<div class="col-9">
						<li class="titulo">Padaria Mais Sabor</li>
					</div>
					<div class="col-2">
							<ul class="ul-drop ">
								<li  class="list" id="usr"  onclick="Drop()">'.$_SESSION['login'].'</li>
								<li  class="list" name="drop" id="d1" onclick="login(4)">Perfil</li>
								<li  class="list" name="drop" id="d2" onclick="login(3)">Deslogar</li>
							</ul>
					</div>	
					
				</div>
				';
				
			echo'<div class="row">
					<div class="col-1 menu fix">
						<ul>	
							<li class="list" id="usu" onclick="selecao(1)">Usuario</li>
							<li class="list" id="gastos" onclick="selecao(2)">Gasto</li>
							<li class="list" id="categoria" onclick="selecao(3)">Categoria</li>
							<li class="list" id="materiaprima" onclick="selecao(4)">Materia</li>
							<li class="list" id="receita" onclick="selecao(5)">Receita</li>
						</ul>	
				</div>
			<div class="col-11 conteudo" id="conteudo">
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

<!-- <div class="col-12 rela">
					<div class="col-3">
						<div id="myDropdown" class="dropdown-content">
							<li class="list" onclick="login(4)">Perfil</li>
							<li class="list" onclick="login(3)" >Deslogar</li>
						</div>
					</div>
				</div> -->
<!-- 
				<div id="myDropdown" class="dropdown-content">
							<li class="list" onclick="login(4)">Perfil</li>
							<li class="list" onclick="login(3)" >Deslogar</li>
					</div>				 -->
				