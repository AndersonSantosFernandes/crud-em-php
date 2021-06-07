<?php
session_start();//Entra na sessão depois da valicação
session_destroy();//Destroi a sessão atual 'logout'
header("location: index.php"); //Redireciona para a página de login
exit;// Encerra o comando php
?>