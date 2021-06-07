<?php
//session_start();//tambem iniciar sessao para puxar da pagina anterior a confirmação de sessão.
include("verifica_login.php");
include_once("conexao.php");
$mudar = isset($_POST['mudaTema'])?$_POST['mudaTema']:"";
if (empty($_POST['mudaTema'])){
}else{
if($mudar == 1){
    $tema = '_css/painel02.css';
}else if($mudar == 2){ 
    $tema = '_css/painel.css';
}else if($mudar == 3){
    $tema = '_css/painel03.css';
}else{
    $tema = '_css/painel.css';
}
$sql = "update css set cod_css = '$tema' ";
$mudou = mysqli_query($conexao, $sql);
}
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
    <title>Painel php</title>
</head>
<body>
    <div id="main">
        <header id="cabecalho">
            <h1> Olá, <?php echo$_SESSION['usuario']?>, você está logado na sessão!</h1>
            <h1>Página inicial</h1>    
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
        <div id="welcome">
            <h3>
                <p>
                    Olá! Através desse sistema é possivel Cadastrar usuários padrão  para ter acesso as funções
                    do sistema. Este usuário pode cadastrar outros novos e decidir se também serão padrões.
                    Depois de logado o usuário pode cadastrar porodutos em um banco de dados realizar vendas,
                     realizar consultas de venda, estoque e usuários, excluir e alterar preços de
                    produtos, consultar faturamento total de um unico produto ou faturamento geral desde o 
                    início da operação do sistema ou em um detrminado intervalo. Destas funções, algumas não poderão 
                    ser executadas por um usuário comum, como excluir ou cadastrar usuário.   
                </p>                
            </h3>
        </div>
        <center>
  <form id="pri" method="post" action="">
      <input type="number" maxlength="1" minlength="1" name="mudaTema" placeholder="1)Azul 2)Marrom 3)Muda interface">
      <input type="submit" value="Mudar cor">
  </form>
  </center>
   </div>
  
   <div id="help">
            <p>
                No campo abaixo é possível alerar a cor do programa ou mudar a interface. <br>
                1 = Azul <br>
                2 = Marrom <br>
                3 = Mudar interface
            </p>
        </div>
</body>
</html>