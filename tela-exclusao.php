<?php
include("verifica_login.php");
include_once("conexao.php");
$mostrar = "sim";
$email = isset($_POST['email'])?$_POST['email']:"";

if(empty($_POST['email'])){
    print"";
}else{
    $usador = $_SESSION['usuario'];
    $valida_admin = "select administrador from usuarios where nome = '$usador'";
    $verify = mysqli_query($conexao,$valida_admin);
    $conf_verify = mysqli_fetch_array($verify);
    $mostrar = $conf_verify[0];
    //print "$mostrar";
if($mostrar == "sim"){
    $sql_delete = "delete from usuarios where email = '$email'"; 
    $alva = mysqli_query($conexao, $sql_delete);   
}//else{    print"";}
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
    <title>Excluir_Produto</title>
</head>
<body>
    <div id="main">
    <header id="cabecalho">
    <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
    <h1>Excluir Usuário</h1>    
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
                            <legend>Excluir por nome</legend>
                            <input type="text" name="email"  placeholder="E-mail" >
                            <input type="submit" value="Excluir">                       
                        </fieldset>
                    </form>
        </div> 
        <div id="form-int">
            <?php
              // print "$linhas";//linha de teste utilizada pra ver se retorna 0 ou 1 ao axecutar a query.
              if(empty($_POST['email'])){
                  print"";
              }else{
              if($mostrar == "sim"){
                if ($linhas >= 1){
                    if ($linhas == 1){
                      print "<h2>O usuário com e-mail <strong>$email</strong> foi excluído</h2>";
                   }
                }else if ($linhas == 0){
                    if ($email == null){
                        print "";
                    }else{
                        print "<h2>Usuário com o nome de e-mail <strong> $email </strong> não existe</h2>";
                    }                    
                }               
            }else{
                print"<h2>Somente administradores podem excluir usuários</h2>";
            } 
        }  
        
     
        mysqli_close($conexao);          
            ?>   
        </div>   
   </div>
   <center>
<h1>Lista de usuários</h1>
<iframe src="lista_usuarios.php"  width="1000" height="160" frameborder="0"></iframe></center>  
        <div id="help">
            <p>
                Para excluir um usuário, copiar o nome de e-mail do usuário na lista abaixo e colar 
                no campo E-mail e confirmar em excluir. <br>
                Somente administrador pode executar esta ação.
            </p>
        </div>
</body>
</html>