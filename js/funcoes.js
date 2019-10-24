var Gmaterias =Object;
var Ggastos =Object;
var ingreT;
var tablem_id=0;
var tableg_id=0;
var mat_id=[];
var gas_id=[];
var obj_mat=[];
var obj_gas=[];
function alerta(oi){
    alert(oi);
}
function anime(id){
    element= document.getElementById(id);
    element.style.marginTop="60px";
}
function anime2(id,tipo){
    element= document.getElementById(id);
    // console.log(element.className);
    // if(element.className!= "sair"){
        switch (tipo){
        case 1:
            element.className="list_table_usu_a";
        break;
        case 2:
            element.className="list_table_gas_a";
        break;
        case 3:
            element.className="list_table_cat_a";
        break;
        case 4:
            element.className="list_table_mat_a";
        break;
        case 5:
            element.className="list_table_rec_a";
        break;
        }
        
   
}
function addScript(callback) {
    se=document.getElementById(1);
    if(se != null){
        se.remove();
    }
  var s = document.createElement( 'script' );
  s.innerHTML=callback;
  s.id=1;
  document.body.appendChild( s );
}
function get_numeric($val) {
    if (is_numeric($val)) {
      return $val + 0;
    }
    return 0;
  } 
function Drop() {
    document.getElementById("d1").classList.toggle("show");
    document.getElementById("d2").classList.toggle("show");
}
function sel_cat(cat){
      document.getElementById("tbCategoria_nome_categoria").value = cat;
}
function sel_mat(mat,id,tipo,bdid){
    document.getElementById(id.id).value = mat;
    document.getElementById(id.id).name = bdid;
    id_tipo=id.id.replace("nome","tipo");    
    switch (tipo){
        case "quilo(s)":
            t="Kg";
        break;
        case "litro(s)":
            t="L";
        break;
    }
    document.getElementById(id_tipo).value = t;

}
function sel_gas(mat,id,tipo,bdid){
    document.getElementById(id.id).value = mat;
    document.getElementById(id.id).name = bdid;
    id_tipo=id.id.replace("nome","tipo");    
    switch (tipo){
        case "hora(s)":
            t="h";
        break;
        case "litro(s)":
            t="L";
        break;
    }
    document.getElementById(id_tipo).value = t;

}
function valor_ingrediente_final(t){
    total=00,00;
    if(t=="m"){
        for(i=0;i<mat_id.length;i++){
            a=mat_id[i];
            valor=document.getElementById("m_valor_"+a).value;
            if(!Number.isNaN(valor)&&valor!=''){
                total=parseFloat(total)+parseFloat(valor);
            }
        }
        document.getElementById("ingreT").value=total;
    }else{
        for(i=0;i<gas_id.length;i++){
            a=gas_id[i];
            valor=document.getElementById("g_valor_"+a).value;
            if(!Number.isNaN(valor)&&valor!=''){
                total=parseFloat(total)+parseFloat(valor);
            }
        }
        document.getElementById("gastoT").value=total;
    }
    gv=document.getElementById("gastoT").value;
    iv=document.getElementById("ingreT").value;
    gv=Number(gv);   
    iv=Number(iv);   
    document.getElementById("valor_receita").value=(parseFloat(gv)+parseFloat(iv)).toFixed(2);
    att();

}
function att(){
    por=document.getElementById("lucro").value;
    if(por!=''){
        valb=document.getElementById("valor_receita").value;
        valt=parseFloat(valb)+parseFloat((valb*por)/100);
        document.getElementById("valor_final").value=valt.toFixed(2);
    }
    
}
function cal_bruto(por){
    valb=document.getElementById("valor_receita").value;
    valt=parseFloat(valb)+parseFloat((valb*por)/100);
    document.getElementById("valor_final").value=valt.toFixed(2);

}
function cal_val(val,id,t){
    val=parseFloat(val);
    if(t=="m"){
        linha = document.getElementById("m_nome_"+id);
        if(!linha.value){
            v=null;
        }else{
            v=true;
        }
        if(v==true){
                for(i=0;i<Gmaterias.length;i++){
                    if(Gmaterias[i]["idmateria_prima"]==linha.name){
                        final=(Gmaterias[i]["preco"]*val)/Gmaterias[i]["quantidade"];
                        finalf=final.toFixed(2);
                    }
                }
            document.getElementById("m_valor_"+id).value=finalf;            
        } 
        valor_ingrediente_final('m');
    }else{
        linha = document.getElementById("g_nome_"+id);
        if(!linha.value){
            v=null;
        }else{
            v=true;
        }
        if(v==true){
                for(i=0;i<Ggastos.length;i++){
                    if(Ggastos[i]["idgastos_extras"]==linha.name){
                        final=(Ggastos[i]["valor"]*val)/Ggastos[i]["quantidade"];
                        finalf=final.toFixed(2);
                    }
                }
            document.getElementById("g_valor_"+id).value=finalf; 
        } 
        valor_ingrediente_final('g');
    }
  
}
function lixo(elemento,t){
    a=elemento.id.substring(7,8);
    a=Number(a);   
    if(t=="m"){
        for( var i = 0; i < mat_id.length; i++){ 
            if ( mat_id[i] === a) {
            mat_id.splice(i, 1); 
            }
        }
        elemento.parentElement.parentElement.parentElement.parentElement.remove();
        valor_ingrediente_final('m');
    }else{
         for( var i = 0; i < gas_id.length; i++){ 
            if ( gas_id[i] === a) {
            gas_id.splice(i, 1); 
            }
        }
        elemento.parentElement.parentElement.parentElement.parentElement.remove();
        valor_ingrediente_final('g');
    }
    att();
}
function plus_ingrediente(materias,ingredientes){
    if(ingredientes==undefined){
        repete=1;
        veri=true;
    }else{
        repete=ingredientes.length;
        veri=false;
    }
    for(r=0;r<repete;r++){
        if(veri==true){
            r=repete;
        }
        table = document.getElementById("plus_ingrediente");
        row = table.insertRow(table.rows.length-1);
        cell1 = row.insertCell(0);
        tablem_id++;
        mat_id.push(tablem_id);
        mat='<div class="input-group">';
        mat+='<div class="val_ingre">'; 
        mat+='<label>Nome:</label>';
        mat+='<div class="dropdown-cat">';
        mat+='<input type="text" disabled name="nome" id="m_nome_'+mat_id[mat_id.length-1]+'" class="dropbtn-cat">';
        mat+='<div class="dropdown-content-cat">';
        
        for(a=0; a<materias.length; a++){
            mat+='<a onclick="sel_mat(&quot; '+materias[a]["nome"]+' &quot;,m_nome_'+mat_id[mat_id.length-1]+',&quot;'+materias[a]["tipo_medida"]+'&quot;,&quot;'+materias[a]["idmateria_prima"]+'&quot;)">'+materias[a]["nome"]+'</a>';
        }
        mat+='</div></div></div>';
        Gmaterias=materias;
        mat+='<div class="val_ingre"><label class="middle">Qtd:</label><input onwmousewheel="cal_val(this.value,'+mat_id[mat_id.length-1]+',&quot;m&quot;)" onKeyUp="cal_val(this.value,'+mat_id[mat_id.length-1]+',&quot;m&quot;)" class="middle" type="number" step="0.01" min="0" name="quantidade" id="m_quantidade_'+mat_id[mat_id.length-1]+'" ></div>';
        mat+='<div class="val_tipo"><input class="middle" type="text" name="tipo" id="m_tipo_'+mat_id[mat_id.length-1]+'" disabled></div>';
        mat+='<div class="val_ingre"><label class="right">Valor:</label><input class="right" type="number" step="0.01" min="0" name="valor" id="m_valor_'+mat_id[mat_id.length-1]+'" disabled></div>';
        mat+='<div class="val_tipo"><input class="middle" type="text" name="sifrao" value="R$" id="m_sifrao_'+mat_id[mat_id.length-1]+'" disabled></div>';
        mat+='<div class="val_ingre"><button class="lixo" nome="oi" id="m_lixo_'+mat_id[mat_id.length-1]+'" onclick="lixo(this,&quot;m&quot;)"></button></div></div>';
        cell1.innerHTML= mat;
        cell1.className = 'td-log';
        
    }
    if(veri==false){
        val=0;
            for(i=0; i<ingredientes.length; i++){
                for(a=0; a<materias.length; a++){
                    if(materias[a]["idmateria_prima"]==ingredientes[i]["tbMateria_prima_idmateria_prima"]){
                        document.getElementById('m_nome_'+[i+1]).value=materias[a]["nome"];
                        document.getElementById('m_nome_'+[i+1]).name=materias[a]["idmateria_prima"];
                        tipo=materias[a]["tipo_medida"];
                        switch (tipo){
                            case "quilo(s)":
                                t="Kg";
                            break;
                            case "litro(s)":
                                t="L";
                            break;
                        }
                        document.getElementById('m_tipo_'+[i+1]).value = t;

                    }
                }
                document.getElementById('m_quantidade_'+[i+1]).value=parseFloat(ingredientes[i]["quantidade"]);
                document.getElementById('m_valor_'+[i+1]).value=ingredientes[i]["preco"];

                val+=parseFloat(ingredientes[i]["preco"]);
            }
            document.getElementById('ingreT').value=val;
        }
}
function plus_gasto(gastos,gastos_e){
    if(gastos_e==undefined){
        repete=1;
        veri=true;
    }else{
        repete=gastos_e.length;
        veri=false;
    }
    for(r=0;r<repete;r++){
        if(veri==true){
            r=repete;
        }
        table = document.getElementById("plus_gasto");
        row = table.insertRow(table.rows.length-1);
        cell1 = row.insertCell(0);
        tableg_id++;
        gas_id.push(tableg_id);
        mat='<div class="input-group">';
        mat+='<div class="val_ingre">'; 
        mat+='<label>Nome:</label>';
        mat+='<div class="dropdown-cat">';
        mat+='<input type="text" disabled name="nome" id="g_nome_'+gas_id[gas_id.length-1]+'" class="dropbtn-cat">';
        mat+='<div class="dropdown-content-cat">';
        
        for(a=0; a<gastos.length; a++){
            mat+='<a onclick="sel_gas(&quot; '+gastos[a]["nome"]+' &quot;,g_nome_'+gas_id[gas_id.length-1]+',&quot;'+gastos[a]["tipo_medida"]+'&quot;,&quot;'+gastos[a]["idgastos_extras"]+'&quot;)">'+gastos[a]["nome"]+'</a>';
        }
        mat+='</div></div></div>';
        Ggastos=gastos;
        mat+='<div class="val_ingre"><label class="middle">Qtd:</label><input onwmousewheel="cal_val(this.value,'+gas_id[gas_id.length-1]+',&quot;g&quot;)" onKeyUp="cal_val(this.value,'+gas_id[gas_id.length-1]+',&quot;g&quot;)" class="middle" type="number" step="0.01" min="0" name="quantidade" id="g_quantidade_'+gas_id[gas_id.length-1]+'" ></div>';
        mat+='<div class="val_tipo"><input class="middle" type="text" name="tipo" id="g_tipo_'+gas_id[gas_id.length-1]+'" disabled></div>';
        mat+='<div class="val_ingre"><label class="right">Valor:</label><input class="right" type="number" step="0.01" min="0" name="valor" id="g_valor_'+gas_id[gas_id.length-1]+'" disabled></div>';
        mat+='<div class="val_tipo"><input class="middle" type="text" name="sifrao" value="R$" id="g_sifrao_'+gas_id[gas_id.length-1]+'" disabled></div>';
        mat+='<div class="val_ingre"><button class="lixo" nome="oi" id="g_lixo_'+gas_id[gas_id.length-1]+'" onclick="lixo(this,&quot;g&quot;)"></button></div></div>';
        cell1.innerHTML= mat;
        cell1.className = 'td-log';
    }
     if(veri==false){
        val=0;
            for(i=0; i<gastos_e.length; i++){
                for(a=0; a<gastos.length; a++){
                    if(gastos[a]["idgastos_extras"]==gastos_e[i]["tbGastos_extras_idgastos_extras"]){
                        document.getElementById('g_nome_'+[i+1]).value=gastos[a]["nome"];
                        document.getElementById('g_nome_'+[i+1]).name=gastos[a]["idgastos_extras"];
                        tipo=gastos[a]["tipo_medida"];
                        switch (tipo){
                            case "hora(s)":
                                t="h";
                            break;
                            case "litro(s)":
                                t="L";
                            break;
                        }
                        document.getElementById('g_tipo_'+[i+1]).value = t;

                    }
                }
                document.getElementById('g_quantidade_'+[i+1]).value=parseFloat(gastos_e[i]["quantidade"]);
                document.getElementById('g_valor_'+[i+1]).value=gastos_e[i]["preco_gasto_extra"];

                val+=parseFloat(gastos_e[i]["preco_gasto_extra"]);
            }
            document.getElementById('gastoT').value=val;
        }
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
                document.getElementById("tipo_medida").value = "hora(s)";
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
    // document.getElementById("dropdown-content-tipo").style.display = "none"; 
}
document.addEventListener ('click', (event) => {
    if(document.getElementById("receita")!=null){
        rece=document.getElementById("receita");
        if(rece.className=="list-click"){
            po=document.getElementsByTagName("table").length-1;
            if(document.getElementsByTagName("table")[po].id=="tab-x"){
                tag=event.target.tagName;
                if(tag=="TABLE"){
                    id=event.target.id;
                    id=id.slice(4);
                    if(id!="x"){
                        receita(0,id);
                    }
                }else if(tag=="TH" || tag=="TD"){
                    id=event.target.offsetParent.id;
                    id=id.slice(4);
                    if(id!="x"){
                        receita(0,id);
                    }
                }else if(tag=="IMG"){
                    id=event.target.offsetParent.offsetParent.id;
                    id=id.slice(4);
                    if(id!="x"){
                        receita(0,id);
                    }
                }
            }
        }
    }
});
document.addEventListener ('keypress', (event) => {
    if (event.keyCode === 13 ) {
        if(document.getElementById("preparo")!=undefined){
            foco=document.getElementById("preparo");
            if(document.activeElement!=foco){
                event.preventDefault();
                document.getElementById("submit").click();
            }
        }else{
            event.preventDefault();
            document.getElementById("submit").click();
        }
    }
  });

window.onclick = function(event) {
    if (event.target.id!="usr") {
      var dropdowns1 = document.getElementById("d1");
      var dropdowns2 = document.getElementById("d2");
      var i;
        if(dropdowns1!=null){
            if (dropdowns1.classList.contains('show')) {
                dropdowns1.classList.remove('show');
            }
            if (dropdowns2.classList.contains('show')) {
                dropdowns2.classList.remove('show');
            }
        }
    }
  }


function selecao(e){
    document.getElementById("usr").className = "list";
    document.getElementById("usu").className = "list";
    document.getElementById("gastos").className = "list";
    document.getElementById("categoria").className = "list";
    document.getElementById("materiaprima").className = "list";
    document.getElementById("receita").className = "list";
    // table= document.getElementsByTagName("table");

        switch (e){
            case 1:
    //             ,null,null,async ()=>{if(document.getElementsByTagName("table")[0]!=undefined){
    //     for(a=0;a<document.getElementsByTagName("table").length; a++){
    //         await new Promise(done => setTimeout(() => { table[a].className="sair";console.log(table[a]);done();}, 500));  
    //     }
    // }}
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

function log_in(acao){
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
            document.getElementById("usr").className = "list-click";
            document.getElementById("usu").className = "list";
            document.getElementById("gastos").className = "list";
            document.getElementById("categoria").className = "list";
            document.getElementById("materiaprima").className = "list";
            document.getElementById("receita").className = "list";
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
                }else if(a==5){
                    document.getElementById("erro-senha").innerHTML="* senha não preecnhida";
                    document.getElementById("senha").className = "input-erro";
                }else{
                    document.getElementById("erro-banco").innerHTML="* Problema no banco de dados";
                }
            }
        }      
    }  
}
 function usu(acao,idusuario,sac,callback){
    
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
                x.open("GET", "View/UsuarioAltera.php?idusuario="+idusuario+"&sac="+sac,true);
            break;
            case 4:
            x.open("POST", "Controller/UsuarioControl.php?idusuario="+idusuario+"&acao=3", true);
            break;
        }
        x.send();

        x.onreadystatechange = async function () {

            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;
            //     if(typeof callback === "function"){
            //         callback();
            //     } 
            // await new Promise(done => setTimeout(() => {document.getElementById("conteudo").innerHTML=x.responseText;done();}, 2200));  
                    if(acao==4){
                        usu(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        email=document.getElementById("email").value;
        login=document.getElementById("login").value;
        tipo=document.getElementById("tipo").value;
        image=document.getElementById("image");
        var obj={};
        var formData = new FormData()
        form = document.querySelector('form');
        oi=document.getElementById("upload");
            form.addEventListener('click', e => {
            e.preventDefault()
            const files = document.querySelector('[type=file]').files
                for (let i = 0; i < files.length; i++) {
                    let file = files[i]
                    formData.append('files', file);
                }
            });
        oi.click();
         switch (acao){
            case 5:
                senha=document.getElementById("senha").value;
                url = 'Controller/UsuarioControl.php?nome='+nome+'&email='+email+'&login='+login+'&senha='+senha+'&tipo='+tipo+'&acao=1';
            break;
            case 6:
                file=document.getElementById("file").name;
                url = 'Controller/UsuarioControl.php?nome='+nome+'&email='+email+'&login='+login+'&tipo='+tipo+'&idusuario='+idusuario+'&image='+file+'&acao=2';
            break;
        }
         fetch(url, {
            method: 'POST',
            body: formData,
        }).then(response => {
            if (response.status == 200) {
                if(sac==2){
                    usu(2);   
                }else if(sac==4){
                    log_in(4);
                }
            }
        })        
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
                if(acao!=4){
                    document.getElementById("conteudo").innerHTML=x.responseText;
                }else{
                    if(x.responseText==0){
                        document.getElementById("erro-"+idgastos_extras).innerHTML="*gasto em uso";
                        document.getElementById("tab-"+idgastos_extras).style.borderColor = "red";
                    }else{
                        gastos(2);  
                    }
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
                if(acao!=4){
                    document.getElementById("conteudo").innerHTML=x.responseText;
                }else{
                    if(x.responseText==0){
                        document.getElementById("erro-"+idmateria_prima).innerHTML="*matéria em uso";
                        document.getElementById("tab-"+idmateria_prima).style.borderColor = "red";
                    }else{
                        materiaprima(2);  
                    }
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
                if(acao==4){
                    if(x.responseText!=0){
                         categoria(2);  
                    }else{
                        document.getElementById("erro-"+idcategoria).innerHTML="*categoria está em uso";
                         document.getElementById("tab-"+idcategoria).style.borderColor = "red";
                    }
                }else{
                    document.getElementById("conteudo").innerHTML=x.responseText;
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
            case 0:
                x.open("GET", "View/ReceitaExpandida.php?idreceita="+idreceita,true);
            break;
            case 1:
                x.open("GET", "View/ReceitaInsere.php",true);
            break;
            case 2:
                x.open("GET", "View/ReceitaLista.php",true);
                mat_id=[];
                gas_id=[];
                tablem_id=0;
                tableg_id=0;
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
                if(acao==3 || acao==0){
                    corte=x.responseText.split('script');
                    document.getElementById("conteudo").innerHTML=corte[1];
                    addScript(corte[0].replace('script',''));
                }else{
                document.getElementById("conteudo").innerHTML=x.responseText;}
                    if(acao==4){
                        receita(2);  
                    }        
            } 
        }
    }else{
        nome=document.getElementById("nome").value;
        valor_receita=document.getElementById("valor_receita").value;
        preparo=document.getElementById("preparo").innerHTML;
        lucro=document.getElementById("lucro").value;
        image=document.getElementById("image");
        valor_final=document.getElementById("valor_final").value;
        tbCategoria_nome_categoria=document.getElementById("tbCategoria_nome_categoria").value;
        for(i=0;i<mat_id.length;i++){
            id_m=document.getElementById("m_nome_"+mat_id[i]).name;
            nome_m=document.getElementById("m_nome_"+mat_id[i]).value;
            quantidade_m=document.getElementById("m_quantidade_"+mat_id[i]).value;
            valor_m=document.getElementById("m_valor_"+mat_id[i]).value;
            obj_mat[i]={id: id_m,nome : nome_m.trim(),quantidade : quantidade_m,valor : valor_m};
        }
        for(i=0;i<gas_id.length;i++){
            id_g=document.getElementById("g_nome_"+gas_id[i]).name;
            nome_g=document.getElementById("g_nome_"+gas_id[i]).value;
            quantidade_g=document.getElementById("g_quantidade_"+gas_id[i]).value;
            valor_g=document.getElementById("g_valor_"+gas_id[i]).value;
            obj_gas[i]={id: id_g,nome : nome_g.trim(),quantidade : quantidade_g,valor : valor_g};
        }
        o_mat=JSON.stringify(obj_mat);
        o_gas=JSON.stringify(obj_gas);
        var obj={};
        var formData = new FormData()
        form = document.querySelector('form');
        oi=document.getElementById("upload");
            form.addEventListener('click', e => {
            e.preventDefault()
            const files = document.querySelector('[type=file]').files
                for (let i = 0; i < files.length; i++) {
                    let file = files[i]
                    formData.append('files', file);
                }
            });
        oi.click();
         switch (acao){
            case 5:
                url = "Controller/ReceitaControl.php?nome="+nome+"&valor_receita="+valor_receita+"&preparo="+preparo+"&lucro="+lucro+"&valor_final="+valor_final+"&tbCategoria_nome_categoria="+tbCategoria_nome_categoria+"&materiais="+o_mat+"&gastos="+o_gas+"&acao=1";
            break;
            case 6:
                idreceita=document.getElementById("idreceita").value;
                file=document.getElementById("file").name;
                url = "Controller/ReceitaControl.php?idreceita="+idreceita+"&nome="+nome+"&valor_receita="+valor_receita+"&preparo="+preparo+"&lucro="+lucro+"&valor_final="+valor_final+"&tbCategoria_nome_categoria="+tbCategoria_nome_categoria+"&materiais="+o_mat+"&gastos="+o_gas+"&image="+file+"&acao=2";
            break;
        }
         fetch(url, {
            method: 'POST',
            body: formData,
        }).then(response => {
            if (response.status == 200) {
               receita(2);   
            }
        }) 
    } 
    
}
function senha(acao,email){
    
    x = ajaxIni();
    if(acao<3){

        switch (acao){
            case 1:
                x.open("GET", "View/EsqueceuSenha.php",true);
            break;
        }
        x.send();

        x.onreadystatechange = async function () {
            if (x.readyState==4 && x.status==200){
                document.getElementById("conteudo").innerHTML=x.responseText;      
            } 
        }
    }else{
         switch (acao){
            case 4:
                email=document.getElementById("recu-email").value;
                url='Controller/UsuarioControl.php?email='+email+'&acao=6',true;
            break;
        }
         fetch(url, {
            method: 'POST',
        }).then(response => {
            if (response.status == 200) {
                log_in(2);  
            }
        })        
    } 
}
