<?php 
  require_once '../Controller/GastoExtraControl.php';
    $gasto_extraControl=new GastoExtraControl();
    $gasto_extra=$gasto_extraControl->listarPorId($_REQUEST["idgastos_extras"]);
?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Alterações no Gasto extra</title>
</head>
<body>
<center>
         <table >
            <tr><td>Alterar Gasto Extra</td></tr>
               <tr>
                 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $gasto_extra[0]["nome"]; ?>">
                        </div>
                    </td>     
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Quantidade:</label>
                            <input type="number" step="0.01" min="0" name="quantidade" id="quantidade" value="<?php  echo $gasto_extra[0]["quantidade"]; ?>">
                        </div>
                    </td>      
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Valor:</label>
                            <input type="number" step="0.01" min="0" name="valor" id="valor" value="<?php echo $gasto_extra[0]["valor"]; ?>">
                        </div>
                    </td>       
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                           <label>Tipo de Medida:</label> 
                           <div class="dropdown-tipo">
                                <input type="text" disabled name="tipo_medida" id="tipo_medida" class="dropbtn-tipo" value="<?php  echo $gasto_extra[0]["tipo_medida"]; ?>"/>
                                <div class="dropdown-content-tipo">
                                    <a onclick="select(2,1)">Hora(s)</a>
                                    <a onclick="select(2,2)">Litro(s)</a>
                                </div>
                            </div>     
                       </div>
                    </td>         
               </tr> 
               <tr>
                    <td class="forms" >
                    <input type="hidden" name="idgastos_extras" id="idgastos_extras" value="<?php echo $_REQUEST["idgastos_extras"]?>">
                    <button onclick="gastos(2)" >Voltar</button>
                    <button onclick='gastos(6)'>Salvar</button>
                    </td>
              </tr>  
         </table> 

    </center>
</body>
</html>
