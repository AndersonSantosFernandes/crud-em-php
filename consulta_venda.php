<?php
include("verifica_login.php");
include_once("conexao.php");
$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";    
    /*Aqui é executada uma consulta de valicação para confirmar se o codigo digitado existe na
    tabela de vendas a fim de evitar dar um aresposta positiva sendo falsa*/   
    $sql_valida = "select codigo_produto from vendas WHERE codigo_produto = $codigo";
    $confirma = mysqli_query($conexao, $sql_valida);
    $valida_linha = mysqli_affected_rows($conexao);    
        if (empty($_POST['codigo'])){ /*Validação caso o campo input esteja vazio será realizado a primeira consulta*/
            $sql_vendas = "select p.codigo_produto,p.nome_produto,p.preco,v.quantidade_saida,v.data_venda, v.usuario
            from produtos p, vendas v
            where p.codigo_produto = v.codigo_produto"; //order by 1           
            $salvar = mysqli_query($conexao, $sql_vendas);
        }else{ /*Caso for digitado um código existente no input, será realizado outro tipo de consulta */
            $sql_vendas = "select p.codigo_produto,p.nome_produto,p.preco*sum(v.quantidade_saida),
            sum(v.quantidade_saida),v.data_venda
            from produtos p, vendas v
            where p.codigo_produto = v.codigo_produto
            and p.codigo_produto = $codigo;";            
            $salvar = mysqli_query($conexao, $sql_vendas); 
        }
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
    <link rel="stylesheet" href="_css/help.css">
    <title>Consultar Vendas</title>
</head>
<body>
    <div id="main">
        <header id="cabecalho">        
        <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
        <h1>Consultar Vendas</h1>    
        </header>
        <div id="menu-bar">
            <a href="painel.php">Home</a>
            <a href="venda.php">Venda</a>
            <a href="consulta_estoque.php">Consultar estoque</a>
            <a href="consulta_venda.php">Consultar vendas</a>
            <a href="consulta_usuario.php">Consultar usuários</a>
            <a href="cadastra_produto.php">Cadastrar produtos</a>
            <a href="repor_produto.php">Repor produtos</a>
            <a href="excluir_produto.php">Excluir produtos</a>
            <a href="tela-cadastro.php">Cadastrar usuário</a>
            <a href="tela-exclusao.php">Excluir usuário</a>
            <a href="altera_preco.php">Alterar preço</a>
            <a href="alterar-senha.php">Alterar senha</a>
            <a href="sobre.php">About</a>
            <h2><a href="logout.php">Sair da sessão</a></h2>
        </div>
        <div id="formulario">
                    <form method="post" action="">
                        <fieldset>
                            <legend><h2>Consulta por Código</h2></legend>
                            <input type="number" name="codigo"  placeholder="Código" >
                            <input type="submit" value="Consultar">
                      
                        </fieldset>
                    </form>
                   
        </div> 
        <div id="form-int">
            <?php              
                if ($linhas >= 1){
                    if ($valida_linha == 0){
                        $linhas = 0;
                      }
                    if(empty($_POST['codigo']) && $linhas >=1 ){
                        print "<h2>Constam no sistema $linhas registros</h2>";
                   }else if ($linhas == 1){
                      print "<h2>$linhas resultado encontrado com o código <strong>$codigo</strong></h2>";
                   }else if ($linhas > 1){
                      print "<h2>$linhas resultados encontrados com o código <strong>$codigo</strong></h2>";
                   }else if ($linhas == 0){
                       print "<h2>Nenhum registro encontrado com o código $codigo !</h2>";
                   }
                }            
            ?>  
            
        </div>  
       <center> <a id="geral" href="geral.php"><h2>Faturamento geral</h2></a> </center>
    </div>
   <?php      
                 if ($valida_linha == 0){
                   print "";
                }else{        
            if (empty($_POST['codigo'])){
                while($exibir = mysqli_fetch_array($salvar)){
                    $codigo1 = $exibir[0];
                    $produto = $exibir[1];
                    $preco = $exibir[2];
                    $quantidade = $exibir[3];
                    $saida = $exibir[4];  
                    $usuario = $exibir[5];    
                                       
                    
                    print"<article id='arti'>";                        
                    print "<strong>Códogo:</strong> $codigo1 ";
                    print "    ";
                    print "<strong>Produto:</strong> $produto "; 
                    print "    ";                       
                    print "<strong>Preço:</strong> $preco";
                    print "    ";
                    print "<br><strong>Quantidade vendida:</strong> $quantidade ";
                    print "    ";
                    print "<strong>Ultima saída:</strong> $saida"; 
                    print "                               ";
                    print "<strong>Usuário:</strong> $usuario"; 
                    print"</article>";
                }
            }else{
                while($exibir = mysqli_fetch_array($salvar)){
                    $codigo1 = $exibir[0];
                    $produto = $exibir[1];
                    $preco = $exibir[2];
                    $quantidade = $exibir[3];
                    $saida = $exibir[4];                       
                    
                    print"<article id='arti'>";                        
                   /* print "<strong>Códogo:</strong> $codigo1 ";
                    print "    ";
                    print "<strong>Produto:</strong> $produto";
                    print "    ";                        
                    print "<strong>Valor total recebido:</strong> R$ $preco";
                    print "    ";
                    print "<strong>Quantidade total vendida:</strong> $quantidade>";
                    print "    ";
                    print "<strong>Data saída:</strong> $saida";*/                      
                    Print "Foram vendidas <strong>$quantidade</strong> unidade do produto <strong>$produto.</strong><br> Somando um faturamento total de <strong>R$ $preco</strong>";
                    print"</article>";                    
                } 
            }
        }  
        mysqli_close($conexao);                    
        ?>
        <div id="help">
            <p>
                 Em consultar vendas, será retornado todos os registros.
                Mas se digitarmos um código, será retornado o faturamento total
                daquele produto. Em faturamento geral serão retornadas todas as datas ou um intervalo.
            </p>
        </div>
</body>
</html>