<?php
$hostname = "localhost";//Nome do servidor local
$user = "root";//Nome do usuário padrao
$password = "fmu@1978";//Neste caso o campo senha é nulo
$database = "firma";//Nome do banco de dados
/*---------------------------------------------------------------------------------------- */
/*Isso permite a conexão das outras páginas sem precisar criar um comando em cada
página, se precisar de alteração, altera-se um unico arquivo.*/ 
$conexao = mysqli_connect($hostname,$user,$password,$database); 
/*---------------------------------------------------------------------------------------- */
//Se a aconexão não ocorrer, a mensagem de erro é exibida.
if(!$conexao){
    print "Não foi possivel conectar";
}
?> 
