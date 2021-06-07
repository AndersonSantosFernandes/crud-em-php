<?php
include("verifica_login.php");
include_once("conexao.php");
$linhas=-1;
$codigo     = isset($_POST['codigo'])?$_POST['codigo']:"";
$quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";
if($quantidade >0 ){   
   $sql_repor = "update produtos set quantidade = quantidade + $quantidade where codigo_produto = $codigo";    
   $salvar = mysqli_query($conexao, $sql_repor);
   $linhas = mysqli_affected_rows($conexao);       
       if($linhas == 1){
       $sql_data_atual = "update produtos set ultima_entrada = current_date() where codigo_produto = $codigo";
       $salvar2 = mysqli_query($conexao, $sql_data_atual);
       } 
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
    <link rel="stylesheet" href="_css/help.css">
    <title>Repor produto</title>
</head>
<body>
    <div id="main">
    <header id="cabecalho">
    <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
    <h1>Repor Produto</h1>    
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
                            <legend>Repor por Código</legend>
                            <input type="number" name="codigo"  placeholder="Código" autofocus required>
                            <input type="number" name="quantidade"  placeholder="Quantidade" required>
                            <input type="submit" value="Repor">
                      
                        </fieldset>
                    </form>
        </div> 
        <div id="form-int">
            <?php
           // print"$linhas";
            if($quantidade == null){
                print"";

            }else{
                if($quantidade >0){
                    if($linhas == 1){
                        print"<h2>Estoque alterado com sucesso para o código <strong>$codigo</strong>!</h2>";
                    } else{
                        if($linhas == 0){ 
                                 
                        print"<h2>Código $codigo inexistente<br>Nada foi alterado</h2>";
                         }
                    }   
                }else{
                        if($quantidade<=0){
                        print"<h2>Não é possivel repor uma quantidade negativa</h2>";
                    }
                }
             }
                mysqli_close($conexao); 
            ?>   
        </div> 
  
   </div>
   <center>
<h1>Lista de produtos</h1>
<iframe src="lista_estoque.php"  width="1000" height="160" frameborder="0"></iframe></center>
   <div id="help">
            <p>
                Para repor um produto, basta informar o código e a quantidade depois 
                clicar em confirmar.
            </p>
        </div>
</body>
</html>