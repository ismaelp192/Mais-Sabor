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
 ?>
    <body>
        <div class="row">
             <div class="rece">
                <table class="tab-receita">
                    <tr><td>Receita</td></tr>
                    </tr> 
                        <td class="td-log">
                            <div class="input-group">
                                <label>Nome:</label>
                                <input type="text" name="nome" id="nome" placeholder="Nome">
                            </div>
                        </td> 

                    <tr>
                        <td class="td-log">
                            <div class="input-group">
                                <label>Descrição:</label>
                                <textarea rows="5" cols="30" name="descricao" id="descricao" placeholder="Descrição"></textarea>
                            </div>
                        </td>      
                    </tr> 

                    <tr>
                        <td class="td-log">
                            <div class="input-group">
                                <label>Lucro:</label>
                                <input type="number" min="0" name="Lucro" id="lucro" placeholder="Lucro">
                                         
                            </div>
                        </td>       
                    </tr> 
                    <tr> 
                    <td class="td-log">
                            <div class="input-group">
                                <label>Categoria:</label>
                                <div class="dropdown-cat">
                                    <input type="text" disabled name="tbCategoria_nome_categoria" id="tbCategoria_nome_categoria" class="dropbtn-cat"/>
                                    <div class="dropdown-content-cat">
                                         <?php
                                            for($i=0; $i<sizeof($categorias); $i++){
                                                echo "<a onclick='sel_cat(&quot;" .$categorias[$i]["nome_categoria"]. "&quot; ,tbCategoria_nome_categoria )' >" .$categorias[$i]["nome_categoria"]."</a>";
                                            }
                                        ?> 
                                    </div>
                                </div>              
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-log"> 
                            <div class="input-group">
                                <div class="val">
                                    <label>Valor:</label>
                                    <input type="number" step="0.01" min="0" name="valor_receita" id="valor_receita" disabled>   
                                </div>
                                <div class="val">
                                    <label class="middle">Valor Final:</label>
                                    <input class="middle" type="number" step="0.01" min="0" name="valor_final" id="valor_final" disabled>
                                </div>
   
                            </div>
                            
                        </td> 
                        
                    </tr>
                    <tr>
                        <td class="forms" >
                        <button onclick="receita(2)" >Voltar</button>
                        <button id="submit" onclick='receita(5)'>Salvar</button>
                        </td>
                    </tr>  
                </table> 
            </div>  
             <div class="rece">
                <table id="plus_ingrediente" class="tab-receita" >
                    <tr><td>Ingredientes</td></tr>
                    </tr> 
                        <td class="td-log">
                            <div class="input-group">
                                <button onclick='plus_ingrediente(<?php echo $materias ?>)'> <img src="img/plus.png"  width="20" height="20"></button>
                                <input class="val_ingre_cifrao" type="text" name="sifrao" value="R$" id="sifrao_valorIT" disabled>
                                <input class="val_ingre_total" value="0" type="number" step="0.01" min="0" name="ingreT" id="ingreT" disabled>
                            </div>
                        </td> 
                    </tr>
                </table> 
            </div> 
         
        </div>
    </body>
</html>