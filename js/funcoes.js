function alerta(oi){
    alert(oi);
}

function Drop() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function sel_cat(cat){
    document.getElementById("tbCategoria_nome_categoria").value = cat;
}
function plus_ingrediente(){
    var table = document.getElementById("plus_ingrediente");
    console.log(table.rows.length); 
  var row = table.insertRow(table.rows.length-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  console.log(table.rows.length);
  id=table.rows.length-3;
  quantidade=table.rows.length-3;
  valor=table.rows.length-3;
  cell1.innerHTML = '<div class="input-group"><div class="val_ingre"><label>Nome:</label><input type="text" name="nome" id="nome_'+id+'" placeholder="Nome"></div><div class="val_ingre"><label class="middle">Quantidade:</label><input class="middle" type="number" step="0.01" min="0" name="quantidade" id="quantidade_'+quantidade+'" placeholder=" Quantidade"> </div><div class="val_ingre"><label class="right">Valor:</label><input class="right" type="number" step="0.01" min="0" name="valor" id="valor_'+valor+'" disabled></div></div> ';
  cell1.className = 'td-log';
  cell2.innerHTML = '<div class="input-group"><button onclick="this.parentElement.parentElement.parentElement.remove()"><img src="../img/plus.png"  width="20" height="20"></button></div> ';
  cell2.className = 'td-log';

console.log(table.rows.length); 

}
function select(tipo,numero){
    switch (tipo){
        case 1:
            if(numero==1){
                document.getElementById("tipo").value = "Administrador";
            }else{
                document.getElementById("tipo").value = "Funcionário";
            }
        break;
        case 2:
            if(numero==1){
                document.getElementById("tipo_medida").value = "horas(s)";
            }else{
                document.getElementById("tipo_medida").value = "litro(s)";
            }
        break;
        case 3:
            if(numero==1){
                document.getElementById("tipo_medida").value = "quilo(s)";
            }else{
                document.getElementById("tipo_medida").value = "litro(s)";
            }
        break;
    }
    document.getElementById("dropdown-content-tipo").style.display = "none"; 
}
document.addEventListener ('keypress', (event) => {
    if (event.keyCode === 13 && document.getElementById("entrar") != null) {
        event.preventDefault();
        document.getElementById("entrar").click();
    }
  });
window.onclick = function(event) {
    if (event.target.id!="Drop" ) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


function selecao(e){
    document.getElementById("usu").className = "list";
    document.getElementById("gastos").className = "list";
    document.getElementById("categoria").className = "list";
    document.getElementById("materiaprima").className = "list";
    document.getElementById("receita").className = "list";
    switch (e){
        case 1:
            usu(2);
            document.getElementById("usu").className = "list-click";
        break;
        case 2:
            gastos(2);
            document.getElementById("gastos").className = "list-click";
        break;
        case 3:
            categoria(2);
            document.getElementById("categoria").className = "list-click";
        break;
        case 4:
            materiaprima(2);
            document.getElementById("materiaprima").className = "list-click";
        break;
        case 5:
            receita(2);
            document.getElementById("receita").className = "list-click";
        break;
    }

}
function ajaxIni(){
	if (window.XMLHttpRequest) {
	    
	    xmlhttp = new XMLHttpRequest();
	 } else {
	    
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}

function login(acao){
x = ajaxIni();
    switch (acao){
        case 1:
            log=document.getElementById("login").value;
            senha=document.getElementById("senha").value;
            x.open("POST", "Controller/UsuarioControl.php?login="+log+"&senha="+senha+"&acao=4", true);
        break;
        case 2:
            x.open("GET", "View/Login.php",true);
        break;
        case 3:
            x.open("POST", "Controller/UsuarioControl.php?acao=5", true);
        break;
        case 4:
            x.open("GET", "View/Perfil.php",true);
        break;
    }  
    x.send();
    x.onreadystatechange = function() {
        if (x.readyState == 4 && x.status == 200) {
            if(acao!=3 && acao!=1){    
                    document.getElementById("conteudo").innerHTML=x.responseText;
            }else{
                a=x.responseText;
                if(a!=0){
                    document.getElementById("login").classList.remove("input-erro");
                    document.getElementById("senha").classList.remove("input-erro");
                    document.getElementById("erro-log").innerHTML="";
                    document.getElementById("erro-senha").innerHTML="";
                }
                if(a==0){
                    location.reload();
                }else if(a==1){
                    document.getElementById("senha").className = "input-erro";
                    document.getElementById("erro-senha").innerHTML="* senha incorreta";
                }else if(a==2){
                    document.getElementById("login").className = "input-erro";
                    document.getElementById("erro-log").innerHTML="* usuario não encontrado";
                }else if(a==3){
                    document.getElementById("senha").className = "input-erro";
                    document.getElementById("login").className = "input-erro";
                    document.getElementById("erro-log").innerHTML="* usuario não preenchido";
                    document.getElementById("erro-senha").innerHTML="* senha não preecnhida";
                }else if(a==4){
                    document.getElementById("login").className = "input-erro";
                    document.getElementById("erro-log").innerHTML="* usuario não preenchido";
                }else{
                    document.getElementById("erro-senha").innerHTML="* senha não preecnhida";
                    document.getElementById("senha").className = "input-erro";
                }

                // if(a!=" 0"){
                //     document.getElementById("login").classList.remove("input-erro");
                //     document.getElementById("senha").classList.remove("input-erro");
                //     document.getElementById("erro-log").innerHTML="";
                //     document.getElementById("erro-senha").innerHTML="";
                // }
                // console.log(a);
                // console.log(a.length);
                // switch (a){
                //     case " 0":
                //         location.reload();
                //     break;
                //     case " 1":
                //         document.getElementById("senha").className = "input-erro";
                //         document.getElementById("erro-senha").innerHTML="* senha incorreta";
                //     break;
                //     case " 2":
                //         document.getElementById("login").className = "input-erro";
                //         document.getElementById("erro-log").innerHTML="* usuario não encontrado";
                //     break;
                //     case " 3":
                //         document.getElementById("senha").className = "input-erro";
                //         document.getElementById("login").className = "input-erro";
                //         document.getElementById("erro-log").innerHTML="* usuario não preenchido";
                //         document.getElementById("erro-senha").innerHTML="* senha não preecnhida";
                //     break;
                //     case " 4":
                //         document.getElementById("login").className = "input-erro";
                //         document.getElementById("erro-log").innerHTML="* usuario não preenchido";
                //     break;
                //     case " 5":
                //         document.getElementById("erro-senha").innerHTML="* senha não preecnhida";
                //         document.getElementById("senha").className = "input-erro";
                //     break;

                // }
            }
        }      
    }  
}
function usu(acao,idusuario){
    
    x = ajaxIni();
    if(acao<5){
        switch (acao){
            case 1:
                x.open("GET", "View/UsuarioInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/UsuarioLista.php",true);
            break;
            case 3:
                x.open("GET", "View/UsuarioAltera.php?idusuario="+idusuario,true);
            break;
            case 4:
            x.open("POST", "Controller/UsuarioControl.php?idusuario="+idusuario+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
                    if(acao==4){
                        usu(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        email=document.getElementById("email").value;
        login=document.getElementById("login").value;
        senha=document.getElementById("senha").value;
        tipo=document.getElementById("tipo").value;
        switch (acao){
            case 5:
                x.open("POST", "Controller/UsuarioControl.php?nome="+nome+"&email="+email+"&login="+login+"&senha="+senha+"&tipo="+tipo+"&acao=1", true);
            break;
            case 6:
            idusuario=document.getElementById("idusuario").value;
            x.open("POST", "Controller/UsuarioControl.php?idusuario="+idusuario+"&nome="+nome+"&email="+email+"&login="+login+"&senha="+senha+"&tipo="+tipo+"&acao=2", true);
            break;
        }
        x.send();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
               usu(2);   
            }
        }
    } 
}
function gastos(acao,idgastos_extras){
    
    x = ajaxIni();
    if(acao<5){
        switch (acao){
            case 1:
                x.open("GET", "View/GastoExtraInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/GastoExtraLista.php",true);
            break;
            case 3:
                x.open("GET", "View/GastoExtraAltera.php?idgastos_extras="+idgastos_extras,true);
            break;
            case 4:
            x.open("POST", "Controller/GastoExtraControl.php?idgastos_extras="+idgastos_extras+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
                    if(acao==4){
                        gastos(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        quantidade=document.getElementById("quantidade").value;
        valor=document.getElementById("valor").value;
        tipo_medida=document.getElementById("tipo_medida").value;
        switch (acao){
            case 5:
                x.open("POST", "Controller/GastoExtraControl.php?nome="+nome+"&quantidade="+quantidade+"&valor="+valor+"&tipo_medida="+tipo_medida+"&acao=1", true);
            break;
            case 6:
            idgastos_extras=document.getElementById("idgastos_extras").value;
            x.open("POST", "Controller/GastoExtraControl.php?idgastos_extras="+idgastos_extras+"&nome="+nome+"&quantidade="+quantidade+"&valor="+valor+"&tipo_medida="+tipo_medida+"&acao=2", true);
            break;
        }
        x.send();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
               gastos(2);   
            }
    
        }
    } 

}
function materiaprima(acao,idmateria_prima){
    
    x = ajaxIni();
    if(acao<5){
        switch (acao){
            case 1:
                x.open("GET", "View/MateriaPrimaInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/MateriaPrimaLista.php",true);
            break;
            case 3:
                x.open("GET", "View/MateriaPrimaAltera.php?idmateria_prima="+idmateria_prima,true);
            break;
            case 4:
            x.open("POST", "Controller/MateriaPrimaControl.php?idmateria_prima="+idmateria_prima+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
                    if(acao==4){
                        materiaprima(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        data_validade=document.getElementById("data_validade").value;
        quantidade=document.getElementById("quantidade").value;
        preco=document.getElementById("preco").value;
        tipo_medida=document.getElementById("tipo_medida").value;
        switch (acao){
            case 5:
                x.open("POST", "Controller/MateriaPrimaControl.php?nome="+nome+"&data_validade="+data_validade+"&quantidade="+quantidade+"&preco="+preco+"&tipo_medida="+tipo_medida+"&acao=1", true);
            break;
            case 6:
            idmateria_prima=document.getElementById("idmateria_prima").value;
            x.open("POST", "Controller/MateriaPrimaControl.php?idmateria_prima="+idmateria_prima+"&nome="+nome+"&data_validade="+data_validade+"&quantidade="+quantidade+"&preco="+preco+"&tipo_medida="+tipo_medida+"&acao=2", true);
            break;
        }
        x.send();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
               materiaprima(2);   
            }
    
        }
    } 

}
 
function categoria(acao,idcategoria){
    
    x = ajaxIni();
    if(acao<5){
        switch (acao){
            case 1:
                x.open("GET", "View/CategoriaInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/CategoriaLista.php",true);
            break;
            case 3:
                x.open("GET", "View/CategoriaAltera.php?idcategoria="+idcategoria,true);
            break;
            case 4:
            x.open("POST", "Controller/CategoriaControl.php?idcategoria="+idcategoria+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
                    if(acao==4){
                        categoria(2);  
                    }        
            } 
        }
    }else{
        nome_categoria=document.getElementById("nome_categoria").value;
        switch (acao){
            case 5:
                x.open("POST", "Controller/CategoriaControl.php?nome_categoria="+nome_categoria+"&acao=1", true);
            break;
            case 6:
           idcategoria=document.getElementById("idcategoria").value;
            x.open("POST", "Controller/CategoriaControl.php?idcategoria="+idcategoria+"&nome_categoria="+nome_categoria+"&acao=2", true);
            break;
        }
        x.send();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
               categoria(2);   
            }
    
        }
    } 

}

function receita(acao,idreceita){
    
    x = ajaxIni();
    if(acao<5){
        switch (acao){
            case 1:
                x.open("GET", "View/ReceitaInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/ReceitaLista.php",true);
            break;
            case 3:
                x.open("GET", "View/ReceitaAltera.php?idreceita="+idreceita,true);
            break;
            case 4:
            x.open("POST", "Controller/ReceitaControl.php?idreceita="+idreceita+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
                    if(acao==4){
                        receita(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        valor_receita=document.getElementById("valor_receita").value;
        descricao=document.getElementById("descricao").value;
        lucro=document.getElementById("lucro").value;
        valor_final=document.getElementById("valor_final").value;
        tbCategoria_nome_categoria=document.getElementById("tbCategoria_nome_categoria").value;
        switch (acao){
            case 5:
                console.log("oi");
                x.open("POST", "Controller/ReceitaControl.php?nome="+nome+"&valor_receita="+valor_receita+"&descricao="+descricao+"&lucro="+lucro+"&valor_final="+valor_final+"&tbCategoria_nome_categoria="+tbCategoria_nome_categoria+"&acao=1", true);
            break;
            case 6:
            idreceita=document.getElementById("idreceita").value;
            x.open("POST", "Controller/ReceitaControl.php?idreceita="+idreceita+"&nome="+nome+"&valor_receita="+valor_receita+"&descricao="+descricao+"&lucro="+lucro+"&valor_final="+valor_final+"&tbCategoria_nome_categoria="+tbCategoria_nome_categoria+"&acao=2", true);
            break;
        }
        x.send();
        x.onreadystatechange = function() {
            if (x.readyState == 4 && x.status == 200) {
               receita(2);   
            }
        }
    } 
    
}

