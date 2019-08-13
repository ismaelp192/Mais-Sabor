
<html>
<meta charset="utf-8">
   <head>
      <title>Cadastro da Usuario</title>
   </head>
   <body>
          <table class="login">
            <tr><td >Entrar no Sistema</td></tr>
               <tr>
                  <td class="td-log">
                     <div class="input-group">
                        <label>Login:</label>
                        <input type="text" name="login" id="login" onkeypress="entrar()"placeholder=" Login"><br>
                        <div class="erro-msg" id="erro-log"></div>
                     </div>  
                  </td>      
               </tr> 
               <tr> 
                  <td class="td-log">
                     <div class="input-group">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" onkeypress="entrar()" placeholder=" Senha"><br>
                        <div class="erro-msg" id="erro-senha"></div>
                     <div>
                  </td>    
               </tr> 
               <tr >
                  <td >
                     <button class="log-button" onclick='login(1)' id="entrar">Entrar</button> 
                  </td>
               <tr>  
         </table> 
         <br>  
      
   </body>
</html>

