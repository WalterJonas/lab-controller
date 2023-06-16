<?php
    session_start();
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

    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        form{
            margin: auto;
            width: 80%;
            height: 80%;
            padding: 10px;
        }
        
        body{
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            padding: 0;
        }
    </style>

</head>
<body>
    <form action="../model/buttonActions.php" class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Laboratório</label>
        <input type="text" name="lab" class="form-control" name="lab" placeholder="Ex: 304" required>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Curso</label>
        <input type="text" name="course" class="form-control" placeholder="Ex: Engenharia de Software">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Modalidade</label>
        <input type="text" name="modality" class="form-control" placeholder="Ex: Professor">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Nivel</label>
        <input type="text" name="level" class="form-control">
    </div>
    <div class="col-12">    
        <button type="submit" name="registerAuthorized" class="btn btn-primary">Cadastrar Autorizado</button>
        <a class="btn btn-outline-danger" href="./conciergeInitial.php">Cancelar</a>
    </div>
    
    </form>

<!--
    <form action="../model/buttonActions.php" method="POST">
        <input type="text" name="lab" placeholder="Laboratório" required>
        <input type="text" name="name" placeholder="Nome Completo" required>
        <input type="text" name="course" placeholder="Curso" required>
        <input type="text" name="modality" placeholder="Modalidade" required>
        <input type="text" name="level" placeholder="Nível" required>
        <input type="submit" name="registerAuthorized" value="Cadastrar Autorizado">
    </form>
-->
</body>
</html>