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
    <link rel="stylesheet" href="_css/help.css">
    <title>Consulta estoque</title>
</head>
<body>
    <div id="main">
        <header id="cabecalho">
        <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
        <h1>Consulta estoque</h1>    
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
                            <legend>Consulta por nome</legend>
                            <input type="text" name="codigo"  placeholder="Nome" >
                            <input type="submit" value="Consultar">
                      
                        </fieldset>
                    </form>
        </div> 
        <div id="form-int">
            <?php
                if ($linhas >= 1){
                    if(empty($_POST['codigo']) && $linhas >=1 ){
                        print "<h2>Constam no sistema $linhas registros</h2>";
                   }else if ($linhas == 1){
                      print "<h2>$linhas resultado encontrado com a palavra <strong>$codigo</strong></h2>";
                   }else if ($linhas > 1){
                      print "<h2>$linhas resultados encontrados com a palavra <strong>$codigo</strong></h2>";
                   }else if ($linhas == 0){
                       print "<h2>Nenhum registro enocontrado com a palavra $codigo!</h2>";
                   }
                }            
            ?>   
        </div> 
    </div> 
                <?php                
                    while($exibir = mysqli_fetch_array($salvar)){
                        $codigo1 = $exibir[1];
                        $produto = $exibir[2];
                        $preco = $exibir[3];
                        $quantidade = $exibir[4];
                        $entrada = $exibir[5];
                        $saida = $exibir[6];  

/*
                        $codigo1 = $exibir[1];
                        $produto = $exibir[2];
                        $preco = $exibir[3];
                        $quantidade = $exibir[4];
                        $entrada = $exibir[5]; 
                        $saida = $exibir[6];                        
  */
                        print"<article id='arti'>";                        
                        print "<strong>Produto:</strong> $produto<br>";
                        print "<strong>Códogo:</strong> $codigo1 <br>";
                        print "<strong>Preço:</strong>R$$preco<br>";
                        print "<strong>Quantidade disponível:</strong> $quantidade<br>";
                        print "<strong>Ultima entrada:</strong> $entrada<br>";
                        print "<strong>Ultima venda:</strong> $saida<br>";
                        print"</article>";
                    }  
                    mysqli_close($conexao);                 
                ?>  
        <div id="help">
            <p>
                Acessando a página de consulta estoque, será retornado todos os ítens.
                Mas se digitar um nome ou parte dele, será retornado todos os ítens que 
                contiverem aquela palavra ou parte dela.
            </p>
        </div>
</body>
</html>