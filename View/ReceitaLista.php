<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Lista de Receitas</title>
</head>
    <body >
        <center>

        <?php
        require_once '../Controller/ReceitaControl.php';
        require_once '../Controller/PHPFunction.php';
        $objReceita= new ReceitaControl();
        $lista=$objReceita->listar();
        if((sizeof($lista))>0){
            foreach ($lista as $p){
              echo "<div class='list_list_rec'>";
              echo "<table class='list_table_rec'>";
              echo "<tr><td align=center colspan=2><img id='tab' src='".$p["image"]."'></td></tr>";
              echo "<tr><td class='list_til' colspan=2><b>".$p["nome"]."</b></td></tr>";
              echo "<tr><td>Categoria:</td><td>".$p["tbCategoria_idcategoria"]."</td></tr>";
              echo "<tr><td>Valor Bruto:</td><td>R$".get_numeric($p["valor_receita"])."</td></tr>";
              echo "<tr><td>Lucro:</td><td>".$p["lucro"]."%</td></tr>";
              echo "<tr><td>Valor Líquido:</td><td>R$".get_numeric($p["valor_final"])."</td></tr>";
              echo "<tr><td><button onclick='receita(3,".$p['idreceita'].")' >Alterar</button></td><td><button onclick='receita(4,".$p['idreceita'].")'>Excluir</button></td></tr>";   
              echo "</table>";
              echo "</div>";
          }
          echo "<div class='list_list_rec'>";
          echo "<button onclick='receita(1)' id='plus_rec'></button>";
          echo "</div>";
        }
        else{
        echo "<div class='list_list_rec'>";
        echo "<button onclick='receita(1)' id='plus_rec'></button>";
        echo "</div>";
        }
        ?> 
        </center>
    </body>
</html>