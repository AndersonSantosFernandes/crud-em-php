<?php
include("verifica_login.php");
include_once("conexao.php");
$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
$sql_codigo = "select * from usuarios where nome like '%$codigo%' order by 2";
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
        <h1>Consultar usuários</h1>    
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
               //print "$linhas";
                if ($linhas >= 1){
                    if(empty($_POST['codigo']) && $linhas >=1 ){
                        if($linhas == 1){
                            print "<h2>Consta no sistema $linhas registro</h2>";
                        }else{
                            print "<h2>Constam no sistema $linhas registros</h2>";
                        }
                    }else if ($linhas == 1){
                      print "<h2>$linhas registro encontrado para <br> <strong>$codigo</strong></h2>";
                   }else if ($linhas > 1){
                      print "<h2>$linhas registros encontrados para <br> <strong>$codigo</strong></h2>";
                   }else if ($linhas == 0){
                       print "<h2>Nenhum registro enocontrado com a palavra <br> <strong> $codigo </strong>!</h2>";
                   }
                }             
            ?>   
        </div> 
    </div> 
                
                <?php
                if(empty($_POST['codigo']) && $linhas >=1 ){
                    while($exibir = mysqli_fetch_array($salvar)){
                        $nome = $exibir[1];
                        $sobrenome = $exibir[2];
                        $telefone = $exibir[3];
                        $email = $exibir[4];
                        $admin = $exibir[6];
                        $cadastro = $exibir[7];                       
                        print"<article id='arti'>";
                        print "<strong>Nome:</strong> $nome <br>";
                       /* print "<strong>Sobrenome:</strong> $sobrenome<br>";
                        print "<strong>Telefone:</strong> $telefone<br>";
                        print "<strong>e_mail:</strong> $email<br>";
                        print "<strong>Data de cadástro:</strong> $cadastro<br>";
                        print "<strong>Administrador:</strong> $admin<br>";
                        */print"</article>";
                    } 
                }else{
                    while($exibir = mysqli_fetch_array($salvar)){
                        $nome = $exibir[1];
                        $sobrenome = $exibir[2];
                        $telefone = $exibir[3];
                        $email = $exibir[4];
                        $admin = $exibir[6];
                        $cadastro = $exibir[7];                          
                        print"<article id='arti'>";
                        print "<strong>Nome:</strong> $nome <br>";
                        print "<strong>Sobrenome:</strong> $sobrenome<br>";
                        print "<strong>Telefone:</strong> $telefone<br>";
                        print "<strong>e_mail:</strong> $email<br>";
                        print "<strong>Data de cadástro:</strong> $cadastro<br>";
                        print "<strong>Administrador:</strong> $admin<br>";
                        print"</article>";
                    }   
                }
                    
                      
                    mysqli_close($conexao);
                    ?>
              <div id="help">
            <p>
                Acessando a página de consulta usuários, será retornado todos os nomes de 
                usuários cadstrados.
                Digitando um nome da lista, será retornado o nome e os dados do usuário.
            </p>
        </div>
                    
   
</body>
</html>