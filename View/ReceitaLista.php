<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Lista de Receitas</title>
</head>
    <body >

        <?php
        require_once '../Controller/ReceitaControl.php';
        require_once '../Controller/PHPFunction.php';
        $objReceita= new ReceitaControl();
        $lista=$objReceita->listar();
        $i=0.1;
        if((sizeof($lista))>0){
            foreach ($lista as $p){
              echo "<div class='col-2'>";
              echo "<table id='tab-".$p['idreceita']."' onanimationend='anime2(this.id,5)' onanimationstart='anime(this.id)' style='animation-delay:".$i."s'; class='list_table_rec'>";
              echo "<tr><td align=center colspan=2><img id='tab-1' src='".$p["image"]."'></td></tr>";
              echo "<tr><td align=center class='list_til' colspan=2><b>".$p["nome"]."</b></td></tr>";
              echo "<tr><td>Categoria:</td><td colspan=2>".$p["tbCategoria_idcategoria"]."</td></tr>";
              echo "<tr><td>Valor Bruto:</td><td colspan=2>R$".get_numeric($p["valor_receita"])."</td></tr>";
              echo "<tr><td>Lucro:</td><td colspan=2>".$p["lucro"]."%</td></tr>";
              echo "<tr><td>Valor Líquido:</td><td colspan=2>R$".get_numeric($p["valor_final"])."</td></tr>";
              echo "<tr><td><button onclick='receita(3,".$p['idreceita'].")' >Alterar</button></td><td><button class='exi' onclick='receita(4,".$p['idreceita'].")'>Excluir</button></td></tr>";   
              echo "</table>";
              echo "</div>";
                $i+=0.4/sizeof($lista);
          }
        }
        echo "<div class='col-2'>";
        echo "<table id='tab-x' onanimationstart='anime(this.id)' style='animation-delay:".$i."s';  onclick='receita(1)'class='list_table_rec ghost'>";
        echo "<tr><td align=center ><img id='tab-1' src='img/plus.png'></td></tr>";
        echo "<tr><td align=center class='list_til' ><b>Nova Receita</b></td></tr>";
        echo "</table>";
        echo "</div>";

        ?> 
    </body>
</html>