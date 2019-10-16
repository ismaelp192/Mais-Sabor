<?php 
  require_once '../Controller/UsuarioControl.php';
    $usuarioControl=new UsuarioControl();
    $usuario=$usuarioControl->listarPorId($_REQUEST["idusuario"]);
    $sac=$_REQUEST["sac"];
    $nsac=$sac;
    if($sac==2){
        $sac='usu(2)';
    }else if($sac==4){
        $sac='log_in(4)';
    }
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
                        <input type="email" name="email" id="email" value="<?php  echo $usuario[0]["email"]; ?>">
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
                    <td class="td-log">
                        <div class="input-group">
                           <!-- <input type="hidden" name="MAX_FILE_SIZE" value="500000000">  -->
                           <label>Foto de perfil:</label>
                            <form id="myForm" method="post" enctype="multipart/form-data">
                                <input type="file" id="file" name="<?php echo $usuario[0]["image"]; ?>"/>
                                <input type="submit" id="upload" value="Upload File" name="Upsubmit" hidden/>
                            </form>
                        </div>
                    </td>      
                </tr> 
                <tr>
                    <td class="forms" >
                        <button onclick='<?php echo $sac?>' >Voltar</button>
                        <button id="submit" onclick='usu(6,<?php echo $_REQUEST["idusuario"].",".$nsac?>)'>Salvar</button>
                    </td>
                </tr>  
            </table> 
    </center>
</body>
</html>