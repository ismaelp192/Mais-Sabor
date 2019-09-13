
<html>
<meta charset="utf-8">
   <head>
      <title>Cadastro da Gastos extras</title>
   </head>
   <body >
   <center>
      <table >
            <tr><td>Cadastrar Gasto Extra</td></tr>
               <tr>
                 
                  <td class="td-log">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" placeholder=" Nome">
                        </div>
                    </td>     
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Quantidade:</label>
                            <input type="number" step="0.01" min="0" name="quantidade" id="quantidade" placeholder=" Quantidade">
                        </div>
                    </td>      
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Valor:</label>
                            <input type="number" step="0.01" min="0" name="valor" id="valor" placeholder=" Valor">
                        </div>
                    </td>       
               </tr> 

               <tr>
                  <td class="td-log">
                        <div class="input-group">
                            <label>Tipo de Medida:</label>
                           <div class="dropdown-tipo">
                                <input type="text" disabled name="tipo_medida" id="tipo_medida" class="dropbtn-tipo"/>
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
                    <button onclick="gastos(2)" >Voltar</button>
                    <button id="submit" onclick='gastos(5)'>Salvar</button>
                    </td>
              </tr>  
         </table> 
      </center>
   </body>
</html>