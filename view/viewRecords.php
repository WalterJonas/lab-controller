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
    <title>Visualizar registros</title>

    <link rel="stylesheet" href="./style/viewRecords.css">

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
                <li><a href="./conciergeInitial.php">Home</a></li>
                <li><a href="./registerAuthorized.php">Cadastrar Autorizado</a></li>
                <li><a href="./viewRecords.php">Visualizar Registos</a></li>
                <li><a href="../model/logout.php">Encerrar Sessão</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <div class="container-register">
        <form class="register" method="post">
            <label>Registros de entrada</label>
            <input type="search" autocomplete="off"  placeholder="Buscar Laboratório" name="lab" required>
            <button type="submit" name="labSearchforint">Visualizar</button>
        </form>
        <form class="register" method="post">
            <label>Registros de Saída</label>
            <input type="search" autocomplete="off"  placeholder="Buscar Laboratório" name="lab" required>
            <button type="submit" name="labSearchforout">Visualizar</button>
            </form>
    </div>

    <?php
        require_once "../controller/Conection.php";
        require_once "../model/classes/Concierge.php";
    
        $concierge = new Concierge;         
        $conection = new Conection;

        if(isset($_POST['labSearchforint'])) 
        {
            $lab = addslashes($_POST["lab"]);
                
            if(!empty($lab))
            {
                echo "<h3>Registros de Entrada</h3>";
                $conection->conect("labcontroller", "localhost", "root", ""); 

                if($concierge->inputRecords($lab)==false) 
                {
                    echo "<h2>Não há registros :(</h2>";
                }
            }   
        }   
        if(isset($_POST['labSearchforout'])) 
        {
            $lab = addslashes($_POST["lab"]);
                
            if(!empty($lab))
            {
                echo "<h3>Registro de Saída</h3>";
                $conection->conect("labcontroller", "localhost", "root", ""); 

                if($concierge->outputRecords($lab)==false) 
                {
                    echo "<h2>Não há registros :(</h2> </main>";
                }
            }   
        }     
    ?>
    
    <script src="./JS/mobile-navbar.js"></script>
</body>
</html>