<?php 
  require_once '../Controller/UsuarioControl.php';
    $usuarioControl=new UsuarioControl();
    $usuario=$usuarioControl->listarPorId($_REQUEST["idusuario"]);
?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Alterações no usuario</title>
</head>
<body>
<center>

    <table >
                <tr><td>Alterar Usuario</td></tr>
                <tr>
                    <td class="td-log">
                    <div class="input-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $usuario[0]["nome"]; ?>">
                    </div>
                    </td>      
                </tr> 
                <tr>
                    <td class="td-log">
                    <div class="input-group">
                        <label>Email:</label>
                        <input type="text" name="email" id="email" value="<?php  echo $usuario[0]["email"]; ?>">
                    </div>
                    </td>      
                </tr>  
                <tr>
                    <td class="td-log">
                    <div class="input-group">
                        <label>Login:</label>
                        <input type="text" name="login" id="login" value="<?php echo $usuario[0]["login"]; ?>">
                    </div>
                    </td>      
                </tr>   
                <tr>
                    <td class="td-log">
                    <div class="input-group">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" value="<?php  echo $usuario[0]["senha"]; ?>">
                    </div>
                    </td>      
                </tr> 
                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Tipo:</label><br>
                            <div class="dropdown-tipo">
                                <input type="text" name="tipo" disabled id="tipo" class="dropbtn-tipo" value="<?php  echo $usuario[0]["tipo"]; ?>"/>
                                <div class="dropdown-content-tipo">
                                    <a onclick="select(1,1)">Administrador</a>
                                    <a onclick="select(1,2)">Funcionário</a>
                                </div>
                            </div>
                        </div>                  
                    </td>      
                </tr>
                <tr>
                    <td class="forms" >
                        <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $_REQUEST["idusuario"]?>">
                        <button onclick="usu(2)" >Voltar</button>
                        <button id="submit" onclick='usu(6)'>Salvar</button>
                    </td>
                </tr>  
            </table> 
    </center>
</body>
</html>