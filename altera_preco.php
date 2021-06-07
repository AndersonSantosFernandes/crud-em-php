<?php
  include("verifica_login.php");//Verifica se um usuário está logado
  include_once("conexao.php");//Chama a conexão.php
$nome = $_SESSION['usuario'];//Retorna o nome do usuário que está logado
$codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
$preco = isset($_POST['preco'])?$_POST['preco']:"";



$retornaCodigo = "select * from produtos where codigo_produto = $codigo";//Verifica seo codigo existe no sistema
$confirmarCodigo = mysqli_query($conexao, $retornaCodigo);
$linhaCodogo = mysqli_affected_rows($conexao);

if($linhaCodogo == 1){//Se o código existir, a alteração é executada e caso contrário não.
    $sql_senha = "update produtos
    set preco = $preco
    where codigo_produto = $codigo ";    
    $salvar  = mysqli_query($conexao, $sql_senha);    

} 
$linhas = mysqli_affected_rows($conexao);

/*Trcho de código que muda o tema */
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
                <h1>Alterar Preço</h1>    
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
                        <legend>Alteração de preços</legend>                      
                        <input type="number" name="codigo" placeholder="Código" >
                        <input type="text" name="preco" placeholder="Novo preço">
                        <input type="submit" value="Alterar">
                    </fieldset>
                </form>
                </div>
              <div id="form-int">
                <?php
                        if($linhaCodogo == 1){
                            if ($linhas == 1){
                                print "<h2>Preço alterado com sucesso
                                </h2>";
                            }
                        }else{
                            if(empty($_POST['codigo']) || empty($_POST['preco'])){
                                print "";
                            }else{
                                print"<h2>Não existe produto com este código</h2>";
                            }                            
                        }                    
                    mysqli_close($conexao);
                ?>
                </div>
              </div>
                
         </div>
         <center>
<h1>Lista de produtos</h1>
<iframe src="lista_estoque.php"  width="1000" height="160" frameborder="0"></iframe></center>  
         <div id="help">
       <p>
         Consultar o código na lista, inserir no campo indicado, digitar o novo preço e confirmar 
         em alterar.
       </p>
   </div>
    </body>
</html>