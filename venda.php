<?php
include("verifica_login.php");
include_once("conexao.php");
    $mostra = "";
    $linhas=0;
    $codigo     = isset($_POST['codigo'])?$_POST['codigo']:"";//Recebe os valores digitados no input.
    $quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";//Recebe os valores digitados no input.
    $valer = -1;

    if($quantidade <=0){
        print"";
    }else{
        if (empty($_POST['codigo']) || empty($_POST['quantidade'])){
            print "";
        }else{
            $mostra = 0;
            $sql_quant = "select quantidade from produtos where codigo_produto = $codigo";
            $verifica = mysqli_query($conexao, $sql_quant);
            $exibir = mysqli_fetch_array($verifica);
            $valer = mysqli_affected_rows($conexao);
            if($valer == 1){
                $mostra = $exibir[0];//Aqui recebe a quantidade no estoque
            }    
            $resta = $mostra - $quantidade;// Aqui é quntidade em estoque meno qt vendida       
        if ($mostra < $quantidade ){ 
            print ""; 
        }else{
        //==================================================================================================
        //Nas quatro linhas seguinte é feita uma verificação para bloquear a venda caso houver tentativa de vender algo que não esteja cadastrado.
            $cod_prod = mysqli_real_escape_string($conexao, isset($_POST['codigo'])?$_POST['codigo']:"");
            $query_produtos = "select nome_produto, codigo_produto,preco FROM produtos WHERE codigo_produto = $codigo";
            $resultado = mysqli_query($conexao, $query_produtos);
            $row = mysqli_affected_rows($conexao);//Linha que vai retornar 1 ou 0 após a consulta
            $produto = mysqli_fetch_array($resultado);
            $prod = $produto[0];
            $codig = $produto[1];
            $preco = $produto[2];
        //print"$row linha retornada"; linha tilizada para testes
        
        if($row == 1){//Se for retornado 1, o comando entre chaves é executado
            $usuario = $_SESSION['usuario'];//Recebe o usuário que estiver logado
            $sql = "insert into vendas(codigo_produto,quantidade_saida, data_venda,usuario)
            values($codigo,$quantidade,CURRENT_DATE,'$usuario' )";
            $salvar = mysqli_query($conexao, $sql);
        
            $subTl = $quantidade * $preco;
            $tlVendas = "insert into total_geral (cod_produto,tl_vendas,dt_venda)
            values($codigo, $subTl, current_date())";
            $inserirVendaTotal = mysqli_query($conexao, $tlVendas);
        }
        //==================================================================================================
        }
        }
            $linhas = mysqli_affected_rows($conexao);//Aqui recebe o número de linhas afetadas relativo a vendas
        
    }

    /*Código que faz as mudanças de cor e interface */
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
    <title>Tela de vendas</title>
</head>
<body>
<div id="main">
    <header id="cabecalho">
    <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
    <h1>Tela de vendas</h1>    
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
                        <legend>Informe o código e a quantidade</legend>
                        <input type="text" name="codigo"  placeholder="Código" required autofocus>
                        <input type="number" name="quantidade"  placeholder="Quantidade" required>
                        <input type="submit" value="Confirmar">
                    </fieldset>
                </form>
        </div>
       
                <div id="form-int">              
                <?php      
                print "";
               // print "row $row <br> linha $linhas"; linha para teste de retorno. 
               if ($valer == 0){//Se a consulta relacionada a esta variável não retornar 1, significa que o código não existe no BD
               
                print "<h2>Código $codigo inexistente</h2>";
                
            }else{
               if ($mostra < $quantidade ){//Se a quantidade vendida for maior que a do estoque, a mensagem é exibida
                if($quantidade < 0){
                    Print"<h2>Não existe venda com valor negativo</h2>";
                }    else{   
                        print "<h2>Qantidade em estoque inferior a ser vendida!<br>Favor consultar quntidade disponível.</h2>";
                }    
                
               }else{
                        if($linhas == 1){ // Se a variável $linhas retornar algom resultado após a consulta, é retornado o comando entr chaves.                            
                            print "<h2> Produto: $prod <br>Código: $codig <br> Venda efetuada com sucesso!<br>
                            Saldo em estoque: $resta unidades.</h2>";
                        }else{
                            if(empty($_POST['codigo']) || empty($_POST['quantidade']) ){//Se os campos de input estiverem vazios é executado o que está dentro de chaves
                                print"";
                            }else{//Se não existir o código no sistema 
                                print"<h2>Código de produto inexistente!<br>
                                Venda não efetuada!</h2>";
                            }                            
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
                Para fazer uma venda, basta fazer uma consulta no estoque, e, tendo o 
                código do produto é só inserir no campo apropriado, inserir a quantidade 
                e clicar em Confirmar.
            </p>
        </div>
</body>
</html>