<?php
include_once("conexao.php");
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$conf = $_POST['conf_senha'];
$adm = $_POST['adm'];
if($senha != $conf){ 
    print "<div id='cadastro'>";
    print "<h1>Senhas não conferem</h1>";
    print "<a href='tela-cadastro.php'>voltar</a>";
    print "</div>";    
  // header("location: tela-cadastro.php"); //Caso a condoção seja verdadeira se é direcionado para a página indicada.
}else{
$sql_insert = "insert into usuarios(nome,sobrenome,telefone,email,senha,administrador,data_cadastro)
VALUES('$nome','$sobrenome','$telefone', '$email', md5('$senha'),'$adm',CURRENT_DATE())";
$salvar = mysqli_query($conexao,$sql_insert);
}
$linha = mysqli_affected_rows($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/boot.css">
    <title>Cadastrado</title>
</head>
<body>    
<?php
    if ($senha != $conf){
        print "";
    }else{
        if($linha ==1){
            print "<div id='cadastro'>";
            print "<h1>Cadastrado com sucesso</h1>";
            print "<h1><a href='painel.php'>voltar</a></h1>";
            print "</div>";            
        }else{
            print "<div id='cadastro'>";
            print "<br><h1>Não foi possivel cadastrar!<br>e-mail já em uso</h1>";
            print "<br><h1><a href='tela-cadastro.php'>voltar</a></h1>";
            print "</div>";            
        }
}
mysqli_close($conexao);

?>
</body>
</html>