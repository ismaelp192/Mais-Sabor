<?php
require_once '../Controller/PHPFunction.php';
?>
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
                     <div class="erro-msg" id="erro-banco"></div><br>
                        <label>Login:</label>
                        <input type="text" name="login" id="login" placeholder=" Login"><br>
                        <div class="erro-msg" id="erro-log"></div>
                     </div>  
                  </td>      
               </tr> 
               <tr> 
                  <td class="td-log">
                     <div class="input-group">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder=" Senha"><br>
                        <div class="erro-msg" id="erro-senha"></div>
                     <div>
                  </td>    
               </tr> 
               <tr >
                  <td >
                     <button class="log-button" onclick='login(1)' id="submit">Entrar</button> 
                  </td>
               <tr>  
         </table> 
         <br>  
      
   </body>
</html>

