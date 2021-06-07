<?php
//session_start();//tambem iniciar sessao para puxar da pagina anterior a confirmação de sessão.
include("verifica_login.php");
include_once("conexao.php");

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
    <title>Idealizadores</title>
</head>
<body>
    <div id="main">
    <header id="cabecalho">
    <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
    <h1>Idealizadores</h1>    
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
    <div id="form-int1">
    <h2>
        <p>Anderson Santos Fernandes 7328085</p>
        <p>Gabriela O Farrill Cesar Bota 7681636</p>
        <p>Gustavo Dias Stanev 7395157</p>
        <p>Maicon Douglas – 6640840</p>
        <p>Marco Antonio de Souza 6568576</p>
        <p>Stenio Santana Pompeu - 2311534</p>
        <p>Tatiane Cristina Froes de Araujo 7412800</p>
        <p>Thiago Silva correia 6245206</p>
        <p>Victor Camilo da Silva 3761149</p>
        <p>Vítor Dornelas Carlos RA: 6796045</p>       
</h2> 
    </div>      
   </div>
   <article id="arti">
   <h2>
  <p> 
      Este CRUD foi desenvolvido do absluto zero utilizando a ferramenta VisualStudioCode, 
      onde foi possivel realizar toda codificação necessária para obtenção de um sistema 
      confiável, e, foram executados vários tipos de testes até se chegar no melhor resultado 
      possível.
      As linguagens de programação utilizads foram o PHP para criar os codigos de validações
      combinados com MYSQL, que é a parte de persistência de dados; é onde ficam armazenadas
      todas as informações adquiridas.
      Através do html foi possível a criação de páginas onde os resultados são renderizados
      na tela para o usuário, e não menos importante o CSS, que dá vida e cor às páginas.
  
   </p>
   <p>
        Graças ao empenho da equipe que que foi colaborativa em todas as etapas, o trabalho 
        pode ser terminnado dentro do prazo.
        Podemos dizer que foi uma experiência otima trabalhar neste projeto.
        </p>
</article>


</body>
</html>