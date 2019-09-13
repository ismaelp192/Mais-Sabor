
<html>
<meta charset="utf-8">
   <head>
      <title>Cadastro da Usuario</title>
   </head>
   <body >
   <center>
      <table >
    
                <tr><td >Inserir Usuario</td></tr>
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
                        <label>Email:</label>
                        <input type="text" name="email" id="email" placeholder=" Email">    
                    </div>
                    </td>      
                </tr> 

                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Login:</label>   
                            <input type="text" name="login" id="login" placeholder=" Login">               
                        </div>
                    </td>      
                </tr> 

                <tr>
                    <td class="td-log">
                        <div class="input-group">
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha" placeholder=" Senha">
                        </div>
                    </td>      
                </tr> 

                <tr>
                   
                    <td class="td-log">
                    <div class="input-group">
                        <label>Tipo:</label>
                        <div class="dropdown-tipo">
                                <input type="text" disabled name="tipo" id="tipo" class="dropbtn-tipo"/>
                                <div class="dropdown-content-tipo">
                                    <a onclick="select(1,1)">Administrador</a>
                                    <a onclick="select(1,2)">Funcionário</a>
                                </div>
                            </div>  
                    </div>
                             
                    </td>      
                </tr> 
                <tr>
                        
                        <td class="forms" >
                        <button onclick="usu(2)" >Voltar</button>
                        <button id="submit" onclick='usu(5)'>Salvar</button>
                        </td>
                </tr>  
            </table> 
      </center>
   </body>
</html>