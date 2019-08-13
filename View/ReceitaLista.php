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
        
        echo "<button onclick='receita(1)' >New</button>";
        $objReceita= new ReceitaControl();
        $lista=$objReceita->listar();
        if((sizeof($lista))>0){
            if((sizeof($lista))>1){
                $comp="s";
            }else{
                $comp="";
            }
            echo "<table style=text-align:center;>";
            echo "<tr><td colspan=8><b>Receita".$comp."</b></td></tr>";
            echo "<tr>
                        <td>id</td>
                        <td>Nome</td>                      
                        <td>Descrição</td>
                        <td>Valor receita</td>
                        <td>Lucro</td>
                        <td>Valor final</td>
                        <td>Categoria</td>
                        <td style=text-align:center;>Ações</td>
                        </tr>";
            foreach ($lista as $r){
                echo "<td>".$r["idreceita"]."</td>";
                echo "<td>".$r["nome"]."</td>";
                echo "<td>".$r["descricao"]."</td>";
                echo "<td>".$r["valor_receita"]."</td>";
                echo "<td>".$r["lucro"]."</td>";
                echo "<td>".$r["valor_final"]."</td>";
                echo "<td>".$r["tbCategoria_idcategoria"]."</td>";
                echo "<td>
                        <button onclick='receita(3,".$r['idreceita'].")' >Alterar</button>
                        
                        <button onclick='receita(4,".$r['idreceita'].")'>Excluir</button>
                    
                        </td></tr>";            
            }
            
            echo "</table>";
        }
        else{
            echo "não há registros no banco de dados";
        }
        ?> 
        </center>
    </body>
</html>