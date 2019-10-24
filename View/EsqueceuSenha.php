<?php
require_once '../Controller/PHPFunction.php';
?>
<html>
<meta charset="utf-8">
   <body>
          <table class="login">
            <tr><td >Esqueceu a senha?</td></tr>
               <tr>
                  <td class="td-log">
                     <div class="input-group">
                     <div class="erro-msg" id="erro-banco"></div><br>
                        <label>E-mail:</label>
                        <input type="email" name="recu-email" id="recu-email" placeholder=" E-mail de recuperação"><br>
                     </div>  
                  </td>      
               </tr> 
               <tr>
                  <td >
                     <button class="log-button" onclick='senha(4)' id="submit">Enviar</button> 
                  </td>
               <tr>  
         </table> 
         <br>  
      
   </body>
</html>