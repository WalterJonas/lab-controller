<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="./style/home.css">

</head>
<body>
    <header>
        <nav>
            <a class="logo" href="/">Lab-Controller</a>
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
    <div class="container-register">
        <form class="register" action="checkin.php" method="post">
            <label>Registrar Entrada</label>
            <div class="button">
                <input type="search" placeholder="Número do Laboratório" name="lab" required>
                <button type="submit" name="labSearchforint">Buscar</button>
            </div>
        </form>
        
        <form class="register" action="checkout.php" method="post">
            <label>Registrar Saída</label>
            <div class="button">
                <input type="search"  placeholder="Número do Laboratório" name="lab" required>
                <button type="submit" name="labSearchforout">Buscar</button>
            </div>
        </form>
    </div>
    <?php 
        session_start();
        if(!isset($_SESSION['id']))
        {
            header("location: ../index.php");
            exit;
        }   
        else
        {
            require_once "../controller/Conection.php";
            require_once "../model/classes/Status.php";

            $conection = new Conection;
            $status = new Status;

            $conection->conect("labcontroller", "localhost", "root", "");          
                  
            $status->viewStatus();    
        }                             
    ?>

    </main>
    
    <script src="./JS/mobile-navbar.js"></script>
</body>
</html>