<?php
  include("verifica_login.php");
  include_once("conexao.php");
$nome = $_SESSION['usuario'];
$senha = isset($_POST['senha'])?$_POST['senha']:"";
$confirma_senha = isset($_POST['conf_senha'])?$_POST['conf_senha']:"";
if (empty($_POST['senha'])|| empty($_POST['conf_senha'])){
    print "";
}else{
if($senha != $confirma_senha){
print "";
}else{
    $sql_senha = "update usuarios
    set senha = md5('$senha')
    where nome = '$nome' ";    
    $salvar  = mysqli_query($conexao, $sql_senha);    
}
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
        
        <title>Cadastrar produto</title>
    </head>
    <body>
        <div id="main">
            <header id="cabecalho">
                <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
                <h1>Alterar senha</h1>    
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
                        <legend>Alteração de senha</legend>                      
                        <input type="password" name="senha" placeholder="Nova senha" >
                        <input type="password" name="conf_senha" placeholder="Confirmar">
                        <input type="submit" value="Alterar">
                    </fieldset>
                </form>
                </div>
              <div id="form-int">
                <?php
                   if($senha != $confirma_senha){
                    print "<h2>Senhas digitadas não conferem<h2>";
                    }else{
                        if ($linhas == 1){
                            print "<h2>$nome sua senha foi alterada com sucesso<br>
                            No próximo login utilize a nova senha</h2>";
                        }
                    }
                    mysqli_close($conexao);
                ?>
              </div>
            </div>    
         </div>
         <div id="help">
       <p>
         Somente quem estiver logado na sessão pode mudar a própria senha, 
         que devem ser digitads igualmente nos dois campos.
       </p>
   </div>
    </body> 
</html>