


<?php 
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
 require_once '../Controller/ReceitaControl.php';
 $receitaControl=new ReceitaControl();
 $receita=$receitaControl->listarPorId($_REQUEST["idreceita"]);
 //--------------------------------------------------
 require_once '../Controller/CategoriaControl.php';
 $categoriaControl=new CategoriaControl();
 $categoria=$categoriaControl->listarPorId(intval($receita[0]["tbCategoria_idcategoria"]));
 //------------------------------------------------
 require_once '../Controller/CategoriaControl.php';
 $c= new CategoriaControl();
 $categorias=$c->listar();
 //------------------------------------------------
 require_once '../Controller/MateriaPrimaControl.php';
 $m= new MateriaPrimaControl();
 $materias=$m->listar();
 $materias=json_encode($materias);
 //----------------------------------------------
 require_once '../Controller/GastoExtraControl.php';
 $g= new GastoExtraControl();
 $gastos=$g->listar();
 $gastos=json_encode($gastos);
 //---------------------------------------------
 require_once '../Controller/IngredienteControl.php';
 $i= new IngredienteControl();
 $ingredientes=$i->listarPorId($_REQUEST["idreceita"]);
 $ingredientes=json_encode($ingredientes);
 //------------------------------------------------------
 require_once '../Controller/GastoEspecificoControl.php';
 $ge= new GastoEspecificoControl();
 $gastos_e=$ge->listarPorId($_REQUEST["idreceita"]);
 $gastos_e=json_encode($gastos_e);
 //---------------------------------------------------
 echo "plus_ingrediente(".$materias.",".$ingredientes.");";
 echo "plus_gasto(".$gastos.",".$gastos_e.");script";
 ?>
 <meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Receita</title>
</head>
    <body>
        <div class="row">
             <div class="col-4">
                <table class="tab-receita">                    
                    <tr><th colspan=2><img id='tab-1' src='<?php echo $receita[0]["image"]; ?>'></th></tr>        
                    <tr><th class='list_til' colspan=2><?php echo $receita[0]["nome"]; ?></th></tr>

                    <tr>
                        <td class="td-log">
                            <div class="input-group">
                                <div name="preparo" id="preparo" contentEditable="false" class="editable-show"><?php echo $receita[0]["preparo"]; ?></div>
                            </div>
                        </td>      
                    </tr> 

                    <tr>
                        <td class="td-log">
                            <div class="input-group">
                                <label>Lucro:</label>
                                <input type="number" onload="alert('oi')"  onKeyUp="cal_bruto(this.value)" min="0" name="lucro" id="lucro" value="<?php  echo $receita[0]["lucro"]; ?>" placeholder="Lucro">
                                <input class="val_ingre_cifrao" type="text" name="por" value="%" id="por" disabled>  
                            </div>
                        </td>       
                    </tr> 
                    <tr> 
                    <td class="td-log">
                            <div class="input-group">
                                <label>Categoria:</label>
                                <div class="dropdown-cat">
                                    <input type="text" disabled name="tbCategoria_nome_categoria" id="tbCategoria_nome_categoria" value="<?php  echo $categoria[0]["nome_categoria"]; ?>" />
                                </div>              
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-log"> 
                            <div class="input-group">
                                    <label for="valor_receita" >Valor Bruto:</label><label for="valor_valor_final" class="rightf">Valor Final:</label><br>
                                    <input type="number" class="val_bruto" value="<?php  echo $receita[0]["valor_receita"]; ?>" step="0.01" min="0" name="valor_receita" id="valor_receita" disabled>  
                                    <input class="val_bruto_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                                    <input class="val_ingre_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                                    <input class="val_ingre_total" type="number" step="0.01" value="<?php  echo $receita[0]["valor_final"]; ?>" min="0" name="valor_final" id="valor_final" disabled>
                            </div>
                            
                        </td> 
                        
                    </tr>
                    <tr>
                        <td>
                        <button onclick="receita(2)" >Voltar</button>
                        </td>
                    </tr>  
                </table> 
            </div>  
             <div class="col-4">
                <table id="plus_ingrediente" class="tab-receita" >
                    <tr><td>Ingredientes</td></tr>
                    </tr> 
                        <td class="td-log">
                            <div class="input-group">
                                <input class="val_ingre_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorIT" disabled>
                                <input class="val_ingre_total" value="0" type="number" step="0.01" min="0" name="ingreT" id="ingreT" disabled>
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
                                <input class="val_ingre_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorGT" disabled>
                                <input class="val_ingre_total" value="0" type="number" step="0.01" min="0" name="gastoT" id="gastoT" disabled>
                            </div>
                        </td> 
                    </tr>
                </table> 
            </div>  
         
        </div>
    </body>
</html>