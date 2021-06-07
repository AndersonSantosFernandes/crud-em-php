<?php
include("verifica_login.php");
include_once("conexao.php");

$sql_codigo = "select nome, sobrenome,telefone, email, data_cadastro FROM usuarios";
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
    <title>Consulta usuários</title>
</head>

<body>    
    <table>
        <tr>
            <td>Nome</td>
            <td>Sobrenome</td>
            <td>Telefone</td>
            <td>E-mail</td>
            <td>Data cadastro</td>
           
        </tr>
                <?php                
                    while($exibir = mysqli_fetch_array($salvar)){
                        $nome = $exibir[0];
                        $sobrenome = $exibir[1];
                        $telefone = $exibir[2];
                        $email = $exibir[3];
                        $datac = $exibir[4];
                        

/*
                        $codigo1 = $exibir[1];
                        $produto = $exibir[2];
                        $preco = $exibir[3];
                        $quantidade = $exibir[4];
                        $entrada = $exibir[5];
                        $saida = $exibir[6];                        
  */
                        print"<tr>
                        <td>$nome</td>
                        <td>$sobrenome</td>
                        <td>R$ $telefone</td>
                        <td>$email</td>
                        <td>$datac</td>
                        
                            </tr>";
/*
                        print"<article id='arti02'>";                        
                        print "<strong>Produto:</strong> $produto<br>";
                        print "<strong>Códogo:</strong> $codigo1 <br>";
                        print "<strong>Preço:</strong> $preco<br>";
                        print "<strong>Quantidade disponível:</strong> $quantidade<br>";
                        print "<strong>Ultima entrada:</strong> $entrada<br>";
                        print "<strong>Ultima venda:</strong> $saida<br>";
                        print"</article>";
  */
                    }  
                    mysqli_close($conexao);                 
                ?>  
        </table>
</body>
</html>