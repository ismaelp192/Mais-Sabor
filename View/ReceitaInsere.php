<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Receita</title>
</head>
    <body>
        <center>
             
            <table >
                <tr><td>Inserir Receita</td></tr>
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
                            <label>Valor:</label>
                            <input type="number" min="0" name="valor_receita" id="valor_receita" placeholder="Valor ">
                        </div>
                    </td>       
                </tr> 

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
                            <input type="number"  min="0" name="Lucro" id="lucro" placeholder="Lucro">
                        </div>
                    </td>        
                </tr> 
                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Valor Final:</label>
                            <input type="number" name="valor_final" id="valor_final" placeholder="Valor Final">           
                        </div>
                    </td>       
                </tr>
                <tr> 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Categoria:</label>
                            <input type="text" name="tbCategoria_idcategoria" id="tbCategoria_idcategoria" placeholder="Id da Categoria">            
                        </div>
                    </td>
               </tr>  
                <tr>
                        <td class="forms" >
                        <button onclick="receita(2)" >Voltar</button>
                        <button onclick='receita(5)'>Salvar</button>
                        </td>
                </tr>  
            </table> 
        </center>
    </body>
</html>