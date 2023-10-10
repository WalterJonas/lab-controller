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
                <li><a href="./registerAuthorized.php">Cadastrar Autorizado</a></li>
                <li><a href="./viewRecords.php">Visualizar Registos</a></li>
                <li><a href="../model/logout.php">Encerrar Sessão</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <form method="post">
            <label>Visualizar registros de entrada</label>
            <input type="search" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" name="labSearchforint" value="Buscar" >
        </form>
        <form method="post">
            <label>Visualizar registros de Saída</label>
            <input type="search" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" name="labSearchforout" value="Buscar" >
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
                echo "<hr><div class='linha'>Registros de Entrada</div>";
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
                echo "<div class='linha'>Registro de Saída</div>";
                $conection->conect("labcontroller", "localhost", "root", ""); 

                if($concierge->outputRecords($lab)==false) 
                {
                    echo "<h2>Não há registros :(</h2>";
                }
            }   
        }     
    ?>

</body>
</html>