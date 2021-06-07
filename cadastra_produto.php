<?php
    //Verifica se a sessão foi iniciada por um usuário
    include("verifica_login.php");
    //Sincroniza a conexão que foi criada na página conexao.php
    include_once("conexao.php");
    //Variáveis que vão receber os dados digitado pelo usuário
    $linhas=0;
    $codigo = isset($_POST['codigo'])?$_POST['codigo']:"";
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $preco = isset($_POST['preco'])?$_POST['preco']:"";
    $quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";
   //Comando em sql que vai inserir os dados no banco

        if($quantidade <0){ 
            print"";
        }else{

        
    $sql = "insert into produtos(codigo_produto, nome_produto, preco, quantidade,ultima_entrada)
            VALUES('$codigo','$nome',$preco,$quantidade,CURRENT_DATE())";
    //Executa a conexão e depois o comando sql         
    $salvar = mysqli_query($conexao,$sql);
    //Grava na variável quantas linhas foram afetadas
    $linhas = mysqli_affected_rows($conexao);
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
        <title>Cadastrar produto</title>
    </head>
    <body>
        <div id="main">
            <header id="cabecalho">
                <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
                <h1>Cadastrar Novo Produto</h1>    
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
                        <legend>Informações sobre o produto</legend>
                        <input type="text" name="codigo" maxlength="50" placeholder="Código" required autofocus>                        
                        <input type="text" name="nome" maxlength="60" placeholder="Nome" required>
                        <input type="text" name="preco" placeholder="Preço" required>
                        <input type="number" name="quantidade" placeholder="Quantidade" required>
                        <input type="submit" value="Cadastrar">
                    </fieldset>
                </form>
                </div>
              <div id="form-int">
                <?php
                    
                    if($linhas == 1){

                        print "<h2>Cadástro efetuado com sucesso!</h2>";

                    }else{
                        if(empty($_POST['nome']) || empty($_POST['preco']) ||empty($_POST['quantidade']) ){
                            print"";
                        }else{
                            if($quantidade <0){
                                print"<h2>Não é possivel cadastrar usando quantidade negativa ou igual a zero</h2>";
                            }else{
                            print"<h2>Código já existe no sistema<br>
                            Cadástro não efetuado</h2>";
                        }                        
                    }
                }
                    mysqli_close($conexao);               
                ?>
              </div>
            </div>    
         </div>
         <div id="help">
       <p>
          Para cadastrar um novo produto, basta inserio o código do produto,
           nome, preço e quntidade 
          que entrará no sistema; e depois clicar em Cadastrar.
       </p>
   </div>
    </body>
</html>