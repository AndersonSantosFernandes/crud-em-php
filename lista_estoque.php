<?php
include("verifica_login.php");
include_once("conexao.php");
$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
$sql_codigo = "select * FROM produtos WHERE nome_produto like '%$codigo%'order by 3";
$salvar = mysqli_query($conexao, $sql_codigo);
$linhas = mysqli_affected_rows($conexao);

$sql2 = "select cod_css from css";
$mudou2 = mysqli_query($conexao, $sql2);
$css = mysqli_fetch_array($mudou2);
$cambiar = $css[0];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        print"<link rel='stylesheet' href='$cambiar'>"; 
    ?>   
    <title>Consulta estoque</title>
</head>

</style>
<body>    
    <table>
        <tr>
            <td>Produto</td>
            <td>Código produto</td>
            <td>Preço</td>
            <td>Quantidade disponível</td>
            <td>Ultima entrada</td>
            <td>Ultima saída</td>
        </tr>
                <?php   
                            
                    while($exibir = mysqli_fetch_array($salvar)){
                        $codigo1 = $exibir[1];
                        $produto = $exibir[2];
                        $preco = $exibir[3];
                        $quantidade = $exibir[4];
                        $entrada = $exibir[5];
                        $saida = $exibir[6];  


                        print"<tr>
                        <td>$produto</td>
                        <td>$codigo1</td>
                        <td>R$ $preco</td>
                        <td>$quantidade</td>
                        <td>$entrada</td>
                        <td>$saida</td>
                            </tr>";

                    }  
                    mysqli_close($conexao);                 
                ?>  
        </table>
</body>
</html>