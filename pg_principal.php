<?php 
session_start();//indica para o php que queremos trabalhar com uma sessão
include_once("conexao.php");//Conecta ao BD pela conexão criada na página conexao.php
if(empty($_POST['usuario']) || empty($_POST['pass'])){
// os campos de login estiverem vazios,é retornado para a pagina de login atraves do comando"header("location: index.html")"     
    header("location: index.html");
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);//faz validações e protege contra ataque de sql inject.  
$pass = mysqli_real_escape_string($conexao, $_POST['pass']);
//Efetua uma consulta para checar se o nome de usuario e senha batem e estão no BD
$query = "select nome,senha from usuarios WHERE nome = '{$usuario}' and senha = md5('{$pass}')";
$result = mysqli_query($conexao, $query);//Aqui é executada a consulta ao BD através da conexão

$row = mysqli_num_rows($result); //Aqui mostra o número de linha afetadas pela consulta
print "$row linha afetada";
if($row == 1){
    $_SESSION ['usuario'] = $usuario; 
    header("location: painel.php");//Se a consulta for válida com e-mail e senha, é direcionado para apágina inicial.
    exit();
}else{
    header("location: index.php");//Se a consulta retornar falso redireciona para a página de login novamente.
   // header("location: https://www.youtube.com/");
    exit();
}
mysqli_close($conexao);
?>


