<?php 
  require_once '../Controller/MateriaPrimaControl.php';
    $materiaprimaControl=new MateriaPrimaControl();
    $materia_prima=$materiaprimaControl->listarPorId($_REQUEST["idmateria_prima"]);
?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Alterações na matéria prima</title>
</head>
<body>
<center>
         <table >
            <tr><td>Alterar Matéria prima</td></tr>
               <tr>
               <td class="td-log">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $materia_prima[0]["nome"]; ?>">
                        </div>
                    </td>     
               </tr>  
               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Data de Validade:</label>
                            <input type="date" name="data_validade" id="data_validade" value="<?php  echo $materia_prima[0]["data_validade"]; ?>">
                        </div>
                    </td>      
               </tr> 
               <tr> 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Quantidade:</label>
                            <input type="number" step="0.01" min="0" name="quantidade" id="quantidade" value="<?php echo $materia_prima[0]["quantidade"]; ?>">
                        </div>
                    </td>   
               </tr> 
               <tr> 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Preço:</label>
                            <input type="number" step="0.01" min="0" name="preco" id="preco" value="<?php  echo $materia_prima[0]["preco"]; ?>">
                        </div>
                    </td>     
               </tr> 

               <tr>
                  <td class="td-log">
                     <div class="input-group">
                        <label>Tipo:</label>
                        <div class="dropdown-tipo">
                            <input type="text" name="tipo_medida" disabled id="tipo_medida" class="dropbtn-tipo" value="<?php  echo $materia_prima[0]["tipo_medida"]; ?>"/>
                            <div class="dropdown-content-tipo">
                                <a onclick="select(3,1)">Quilo(s)</a>
                                <a onclick="select(3,2)">Litro(s)</a>
                            </div>
                        </div>     
                     </div>
                  </td>      
               </tr> 
               <tr>
                    <td >
                    <input type="hidden" name="idmateria_prima" id="idmateria_prima" value="<?php echo $_REQUEST["idmateria_prima"]?>">
                    <button onclick="materiaprima(2)" >Voltar</button>
                    <button id="submit" onclick='materiaprima(6)'>Salvar</button>
                    </td>
              </tr>  
         </table> 
    </center>
</body>
</html>