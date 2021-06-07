<?php
include("verifica_login.php");
include_once("conexao.php");
$dataInicio = isset($_POST['inicial'])?$_POST['inicial']:"";
$dataFim =    isset($_POST['final'])?$_POST['final']:"";
if(empty($_POST['inicial'])||empty($_POST['final'])){
    $consultaGeeral = "select sum(tl_vendas) as Total_faturado from total_geral";
    $salvar  = mysqli_query($conexao, $consultaGeeral);
    $linhas = mysqli_affected_rows($conexao);
}else{
$consultaGeeral = "select sum(tl_vendas) as Total_faturado from total_geral where dt_venda between '$dataInicio'and '$dataFim'";
$salvar  = mysqli_query($conexao, $consultaGeeral);
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
    <title>Faturamento Geral</title>
</head>
<div id="main">
<header id="cabecalho">
                <h5> Usuário <?php echo$_SESSION['usuario']?></h5>
                <h1>Consultar Faturamento</h1>    
            </header>
<body>
    
   <div id="formularioGeral">
    <form method = "post" action="">
        <fieldset>
            <legend>Escolha um intervalo</legend>            
           <p> De <input type="date" name="inicial" id="inicio"></p> 
           <p> Até <input type="date" name="final" id="fim"><br></p>
            <input type="submit" value="Consultar">            
        </fieldset>
    </form>
    </div>
    <div id="form-intGeral">  
<?php
/*Função que transforma data padrão americano em padrão brasileiro */
function inverterData($data, $separar ='-', $juntar = '/'){
    return implode($juntar, array_reverse(explode($separar, $data)));
}
$comeco = inverterData($dataInicio);
$fim = inverterData($dataFim);
 while($exibir = mysqli_fetch_array($salvar)){
 $total = $exibir[0];
 if(empty($_POST['inicial'])||empty($_POST['final'])){
    print "<h1>Faturamento desde o início do sistema<br> R$$total</h1>";    
 }else{
     if ($total == null){
         print "<h2>Entre $comeco e $fim não houve faturamento</h2>";
     }else{
 print "<h2>Faturamento parcial entre $comeco e $fim é de <strong>R$$total</strong></h2>";
}
 }
 }
?>

</div>
<center>
<a id="geral" href="consulta_venda.php"><h2>Voltar</h2></a>
</center>
</div>
<div id="help">
            <p>
              Acessando a página sera retornado o faturamanto total constante no banco de dados.
              Escolhendo um intervalo de datas será retornado o faturamento deste intervalo.
            </p>
        </div>
</body>
</html>