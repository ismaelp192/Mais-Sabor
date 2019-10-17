<?php 
  require_once '../Controller/CategoriaControl.php';
    $categoriaControl=new CategoriaControl();
    $categoria=$categoriaControl->listarPorId($_REQUEST["idcategoria"]);
?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Alterações na Categoria</title>
</head>
<body>
<center>
    <table >
            <tr><td>Alterar Categoria</td></tr>
              
               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome_categoria" id="nome_categoria" value="<?php echo $categoria[0]["nome_categoria"]; ?>"><br>
                        </div>
                    </td>      
               </tr> 
              
               <tr>
                    <td >
                    <input type="hidden" name="idcategoria" id="idcategoria" value="<?php echo $_REQUEST["idcategoria"]?>">
                    <button onclick="categoria(2)" >Voltar</button>
                    <button id="submit" onclick='categoria(6)'>Salvar</button>
                    </td>
              </tr>  
         </table> 
    </center>
</body>
</html>