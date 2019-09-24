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

        // echo "<button onclick='receita(1)' ><img src='img/plus.png'  width='20' height='20'></button>";
        $objReceita= new ReceitaControl();
        $lista=$objReceita->listar();
        // if((sizeof($lista))>0){
        //     if((sizeof($lista))>1){
        //         $comp="s";
        //     }else{
        //         $comp="";
        //     }
        //     echo "<table style=text-align:center;>";
        //     echo "<tr><td colspan=8><b>Receita".$comp."</b></td></tr>";
        //     echo "<tr>
        //                 <td>id</td>
        //                 <td>Nome</td>                      
        //                 <td>Descrição</td>
        //                 <td>Valor receita</td>
        //                 <td>Lucro</td>
        //                 <td>Valor final</td>
        //                 <td>Categoria</td>
        //                 <td style=text-align:center;>Ações</td>
        //                 </tr>";
        //     foreach ($lista as $r){
        //         echo "<td>".$r["idreceita"]."</td>";
        //         echo "<td>".$r["nome"]."</td>";
        //         echo "<td>".$r["descricao"]."</td>";
        //         echo "<td>R$".get_numeric($r["valor_receita"])."</td>";
        //         echo "<td>".$r["lucro"]."%</td>";
        //         echo "<td>R$".get_numeric($r["valor_final"])."</td>";
        //         echo "<td>".$r["tbCategoria_idcategoria"]."</td>";
        //         echo "<td>
        //                 <button onclick='receita(3,".$r['idreceita'].")' >Alterar</button>
                        
        //                 <button onclick='receita(4,".$r['idreceita'].")'>Excluir</button>
                    
        //                 </td></tr>";            
        //     }
            
        //     echo "</table>";
        // }

        if((sizeof($lista))>0){
            foreach ($lista as $p){
              echo "<div class='list_list_rec'>";
              echo "<table class='list_table_rec'>";
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