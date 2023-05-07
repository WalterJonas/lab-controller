<?php
    if(!isset($_SESSION['id']))
    {
        header("location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoa autorizada</title>
</head>
<body>
    <form action="../model/buttonActions.php" method="POST">
        <input type="text" name="lab" placeholder="Laboratório" required>
        <input type="text" name="name" placeholder="Nome Completo" required>
        <input type="text" name="course" placeholder="Curso" required>
        <input type="text" name="modality" placeholder="Modalidade" required>
        <input type="text" name="level" placeholder="Nível" required>
        <input type="submit" name="registerAuthorized" value="Cadastrar Autorizado">
    </form>
</body>
</html>