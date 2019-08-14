<html>
<meta charset="utf-8">
   <head>
      <title>Cadastro de Matéria Prima</title>
   </head>
   <body >
   <center>
         <table >
            <tr><td>Inserir Matéria prima</td></tr>
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
                            <label>Data de Validade:</label>
                            <input type="date" name="data_validade" id="data_validade" placeholder=" Data de Validade">
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
                            <label>Preço:</label>
                            <input type="number" step="0.01" min="0" name="preco" id="preco" placeholder=" Preço">
                        </div>
                    </td>     
               </tr> 

               <tr>
                  <td class="td-log">
                     <div class="input-group">
                        <label>Tipo de Medida:</label>
                        <div class="dropdown-tipo">
                              <input type="text" name="tipo_medida" id="tipo_medida" class="dropbtn-tipo"/>
                              <div class="dropdown-content-tipo">
                                 <a onclick="select(3,1)">Quilo(s)</a>
                                 <a onclick="select(3,2)">Litro(s)</a>
                              </div>
                           </div>     
                     </div>
                  </td>      
               </tr> 
               <tr>
                    <td class="forms">
                    <button onclick="materiaprima(2)" >Voltar</button>
                    <button onclick='materiaprima(5)'>Salvar</button>
                    </td>
              </tr>  
         </table> 
      </center>
   </body>
</html>