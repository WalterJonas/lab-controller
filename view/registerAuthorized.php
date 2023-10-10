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

    <link rel="stylesheet" href="./style/cadastrar.css">

</head>
<body>
    <header>
        <nav>
            <a class="logo" href="./conciergeInitial.php">Lab-Controller</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="./registerAuthorized.php">Cadastrar Autorizado</a></li>
                <li><a href="./viewRecords.php">Visualizar Registos</a></li>
                <li><a href="../model/logout.php">Encerrar Sessão</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h3>Cadastrar Pessoas Autrorizadas</h3>

        <div class="formulario">
            <form action="../model/buttonActions.php" method="POST">
                <div>
                    <label for="inputEmail4" class="form-label">Laboratório</label>
                        <input type="text" name="lab"  name="lab" placeholder="Ex: 304" autocomplete="off" required>
                </div>
                <div>
                    <label for="inputPassword4">Nome</label>
                    <input type="text" name="name" autocomplete="off" placeholder="Ex: Lucas " required>
                </div>
                <div>
                    <label for="inputAddress">Curso</label>
                    <input type="text" name="course" autocomplete="off" placeholder="Ex: Engenharia de Software" required>
                </div>
                <div>
                    <label for="inputAddress2" class="form-label">Modalidade</label>
                    <input type="text" name="modality" autocomplete="off" placeholder="Ex: Bolsista" required>
                </div>
                <div>
                    <label for="inputCity">Nivel</label>
                    <input type="text" name="level" autocomplete="off" placeholder="Ex: Aluno" required>
                </div>
                <div class="button">    
                    <button type="submit" name="registerAuthorized">Cadastrar</button>
                    <a href="./conciergeInitial.php">Cancelar</a>
                </div>
            </form>
        </div>

    </main>
<!--     
    <form action="../model/buttonActions.php" method="POST" class="row g-3">
        <div>
            <label for="inputEmail4" class="form-label">Laboratório</label>
            <input type="text" name="lab" class="form-control" name="lab" placeholder="Ex: 304" required>
        </div>
        <div>
            <label for="inputPassword4" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div>
            <label for="inputAddress" class="form-label">Curso</label>
            <input type="text" name="course" class="form-control" placeholder="Ex: Engenharia de Software" required>
        </div>
        <div>
            <label for="inputAddress2" class="form-label">Modalidade</label>
            <input type="text" name="modality" class="form-control" placeholder="Ex: Bolsista" required>
        </div>
        <div>
            <label for="inputCity" class="form-label">Nivel</label>
            <input type="text" name="level" class="form-control" placeholder="Ex: Aluno" required>
        </div>
        <div>    
            <button type="submit" name="registerAuthorized">Cadastrar Autorizado</button>
            <a href="./conciergeInitial.php">Cancelar</a>
        </div>
    </form> -->

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

    <script src="./JS/mobile-navbar.js"></script>
</body>
</html>