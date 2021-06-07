
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel='stylesheet' href='_css/painel.css'> 
      
    <title>Login</title>
</head>
<body>
    <header id="index">
        <h1>Cod-Master Controle de Estoque</h1>
    </header>
   <div id="input">
       <form id="especial" action="pg_principal.php" method="POST">
           <input type="text" name="usuario" maxlength="60" placeholder="Nome" required autofocus>
           <input type="password" name="pass" maxlength="12" minlength="6" placeholder="Senha" required>
           <input type="submit" value="Ir">
           <br>
           <p id="cad"> Insira nome e senha para logar </p>
       </form>
   </div>
   <div id="help">
       <p>
           Somente o usuário padrao pode cadastrar outros usuários depois de logado
           acessando a página "Cadastrar Usuários".
       </p>
   </div>
   <footer>
       &copy; Cod-Master
   </footer>
</body>
</html>