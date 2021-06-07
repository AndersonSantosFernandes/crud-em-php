<?php
include("verifica_login.php");
//=======================Ultimas alterações===============================================
include_once("conexao.php");
    $usador = $_SESSION['usuario'];
    $valida_admin = "select administrador from usuarios where nome = '$usador'";
    $verify = mysqli_query($conexao,$valida_admin);
    $conf_verify = mysqli_fetch_array($verify);
    $mostrar = $conf_verify[0];
//========================================================================================
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
    <title>Fazer Cadastro</title>
</head>
<div id="main">
<body>
<header id="cabecalho">
        <h1>Cod-Master Controle de Estoque</h1>
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
    <form id="especial" method = "post" action="cadastrar.php">
        <fieldset id="fdst">
           
                 <?php
               if($mostrar == "sim"){
                   print "
                  
                   Nome: <input type='text' name='nome' maxlength='30' required>
                   Sobrenome: <input type='text' name='sobrenome'  maxlength='40' required>
                   Telefone: <input type='text' name='telefone'  maxlength='15' required>
                   E-mail: <input type='email' name='email'  maxlength='60' required>
                   Senha: <input type='password' name='senha' required   minlength='6' maxlength='12' >
                   Conf. Senha: <input type='password' name='conf_senha' required  minlength='6' maxlength='12'>                 
                   Administrador: <input type='text' name='adm'  maxlength='3' ninlength='3' required placeholder='sim/nao'>
                   <input id='btn' type='submit' value='Cadastrar'>
                   ";
                }else{
                   print"<h2>Só administrador pode cadastrar novo usuário</h2> ";
                   //print "<input type='text' name='adm' value='nao' placeholder='nao' maxlength='0'>";
               }  
               mysqli_close($conexao);           
               ?>               
                <a href="painel.php"><input id="btn" type="button" value="Voltar"></a>
        </fieldset>
    </form>
    </div>
    <div id="help">
       <p>
          Somente um administrador pode realizar novo cadástro de usuário decidindo
          se este será administrador digitanto sim ou nao no campo aspecífico.
       </p>
   </div>
   
</body>
</html>