<?php 
  require_once '../Controller/ReceitaControl.php';
    $receitaControl=new ReceitaControl();
    $receita=$receitaControl->listarPorId($_REQUEST["idreceita"]);
?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Alterações no Receitas</title>
</head>
    <body>
        <center>
         <table >
                <tr><td>Alterar Receita</td></tr>
                </tr> 
                    <td class="td-log">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $receita[0]["nome"]; ?>">
                        </div>
                    </td> 
                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Valor:</label>
                            <input type="text" min="0" name="valor_receita" id="valor_receita" value="<?php  echo $receita[0]["valor_receita"]; ?>">
                        </div>
                    </td>       
                </tr> 

                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea rows="5" cols="30" name="descricao" id="descricao"><?php echo $receita[0]["descricao"]; ?></textarea>
                        </div>
                    </td>      
                </tr> 

                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Lucro:</label>
                            <input type="text" min="0" name="lucro" id="lucro" value="<?php  echo $receita[0]["lucro"]; ?>">
                        </div>
                    </td>        
                </tr> 
                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Valor Final:</label>
                            <input type="text" step="0.01" min="0" name="valor_final" id="valor_final" value="<?php  echo $receita[0]["valor_final"]; ?>">            
                        </div>
                    </td>       
                </tr>
                <tr> 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Categoria:</label>
                            <input type="text" name="tbCategoria_idcategoria" id="tbCategoria_idcategoria" value="<?php  echo $receita[0]["tbCategoria_idcategoria"]; ?>">            
                        </div>
                    </td>
               </tr>  
                <tr>
                        <td class="forms" >
                        <input type="hidden" name="idreceita" id="idreceita" value="<?php echo $_REQUEST["idreceita"]?>">
                        <button onclick="receita(2)" >Voltar</button>
                        <button onclick='receita(6)'>Salvar</button>
                        </td>
                </tr>  
            </table> 
        </center>
    </body>
</html>