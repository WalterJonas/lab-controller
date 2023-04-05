<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Porteiros</title>
</head>
<body>
    <form action="../model/register.php" method="post">
        <input type="text" name="name" placeholder="Nome" required > <br>
        <input type="email" name="email" placeholder="Email" required > <br>
        <input type="password" name="password" placeholder="Senha" required > <br>
        <input type="password" name="confpassword" placeholder="Confirmar Senha" required > <br>
        <button type="submit" name="registerConcierge" >Cadastrar</button> <br>
    </form>
</body>
</html>