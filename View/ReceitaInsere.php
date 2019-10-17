<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Receita</title>
</head>
<?php 
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 require_once("../Controller/CategoriaControl.php");
 $c= new CategoriaControl();
 $categorias=$c->listar();
 require_once("../Controller/MateriaPrimaControl.php");
 $m= new MateriaPrimaControl();
 $materias=$m->listar();
 $materias=json_encode($materias);
 require_once("../Controller/GastoExtraControl.php");
 $g= new GastoExtraControl();
 $gastos=$g->listar();
 $gastos=json_encode($gastos);
 ?>
    <body>
        <div class="row">
             <div class="col-4">
                <table class="tab-receita">
                    <tr><td>Receita</td></tr>
                    </tr> 
                        <td colspan=2 class="td-log">
                            <div class="input-group">
                                <label>Nome:</label>
                                <input type="text" name="nome" id="nome" placeholder="Nome">
                            </div>
                        </td> 

                    <tr>
                        <td colspan=2 class="td-log">
                            <div class="input-group">
                                <label>Preparo:</label>
                                <textarea rows="5" cols="30" name="preparo" id="preparo" placeholder="preparo"></textarea>
                            </div>
                        </td>      
                    </tr> 

                    <tr>
                        <td colspan=2 class="td-log">
                            <div class="input-group">
                                <label>Lucro:</label>
                                <input type="number" onKeyUp="cal_bruto(this.value)" min="0" name="lucro" id="lucro" placeholder="Lucro">
                                <input class="val_ingre_pcifrao" type="text" name="por" value="%" id="por" disabled>  
                            </div>
                        </td>       
                    </tr> 
                    <tr> 
                    <td colspan=2 class="td-log">
                            <div class="input-group">
                                <label>Categoria:</label>
                                <div class="dropdown-cat">
                                    <input type="text" disabled name="tbCategoria_nome_categoria" id="tbCategoria_nome_categoria" class="dropbtn-cat"/>
                                    <div class="dropdown-content-cat">
                                         <?php
                                            for($i=0; $i<sizeof($categorias); $i++){
                                                echo "<a onclick='sel_cat(&quot;" .$categorias[$i]["nome_categoria"]. "&quot;)' >" .$categorias[$i]["nome_categoria"]."</a>";
                                            }
                                        ?> 
                                    </div>
                                </div>              
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2 class="td-log">
                            <div class="input-group">
                                <label>Foto da Receita:</label>
                                <form id="myForm2" method="post" enctype="multipart/form-data">
                                    <input type="file" name="files" multiple />
                                    <input type="submit" id="upload"value="Upload File" name="Upsubmit" hidden/>
                                </form>
                            </div>
                        </td>       
                    </tr> 
                    <tr>
                        <td class="td-log"> 
                            <div class="input-group">
                                    <label for="valor_receita" >Valor Bruto:</label><br>
                                    <input type="number" class="val_bruto" value="0" step="0.01" min="0" name="valor_receita" id="valor_receita" disabled>  
                                    <input class="val_bruto_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                                   
                            </div>
                            
                        </td> 
                        <td class="td-log"> 
                            <div class="input-group">
                                    <label for="valor_valor_final" class="rightf">Valor Final:</label><br>
                                    <input class="val_ingre_total" type="number" step="0.01" value="0" min="0" name="valor_final" id="valor_final" disabled>
                                    <input class="val_ingre_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                            </div>
                            
                        </td> 
                       
                    </tr>
                    <tr>
                        <td  >
                        <button onclick="receita(2)" >Voltar</button>
                        <button id="submit" onclick='receita(5)'>Salvar</button>
                        </td>
                    </tr>  
                </table> 
            </div>  
             <div class="col-4">
                <table id="plus_ingrediente" class="tab-receita" >
                    <tr><td>Ingredientes</td></tr>
                    </tr>
                        <td class="td-log">
                            <div  class="input-group">
                                <button onclick='plus_ingrediente(<?php echo $materias ?>)'> <img src="img/plus.png"  width="20" height="20"></button>
                            </div>
                        </td> 
                        <td class="td-log">
                            <div class="input-group">
                                <input class="val_ingre_total" value="0" type="number" step="0.01" min="0" name="ingreT" id="ingreT" disabled>
                                <input class="val_ingre_pcifrao" type="text" name="sifrao" value="R$" id="sifrao_valorIT" disabled>
                            </div>
                        </td> 
                    </tr>
                </table> 
            </div>
            <div class="col-4">
                <table id="plus_gasto" class="tab-receita" >
                    <tr><td>Gastos</td></tr>
                    </tr> 
                        <td class="td-log">
                            <div class="input-group">
                                <button onclick='plus_gasto(<?php echo $gastos ?>)'> <img src="img/plus.png"  width="20" height="20"></button>
                            </div>
                        </td> 
                        <td class="td-log">
                            <div class="input-group">
                                <input class="val_ingre_total" value="0" type="number" step="0.01" min="0" name="gastoT" id="gastoT" disabled>
                                <input class="val_ingre_pcifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                            </div>
                        </td> 
                    </tr>
                </table> 
            </div>  
         
        </div>
    </body>
</html>