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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  

    <style>
        body{
            margin: 0;
            padding: 0;
        }
        
        nav{
            color: white;
            background-color: #34A553;
            padding: 10px;
            margin-bottom: 5%;
        }

        nav a{
            color: white;
        }

        .table{
            width: 90vw;
        }

        .registrer_row{
            width: 95vw;
            margin: auto;
        }

        .linha{
            text-align: center;
            font-size: 14pt;
            padding: 10px;
            font-weight: 600;   
        }

        h2{
            text-align: center;
            color: gray;
            margin-top: 5%;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="conciergeInitial.php" class="navbar-brand">lab-controller</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active text-white" href="registerAuthorized.php">Cadastrar Autorizado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="viewRecords.php">Visualizar Registros</a>
            </li>
            <li>
                <a class="nav-link text-danger" href="../model/logout.php">Sair</a>
            </li>
        </ul> 
    </nav>

    <div class="row registrer_row">
        <form class="col" method="post">
            <label>Visualizar registros de entrada</label>
            <input type="search" class="form-control" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" class="btn" name="labSearchforint" value="Buscar" >
        </form>
        <form class="col" method="post">
            <label>Visualizar registros de Saída</label>
            <input type="search" class="form-control" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" class="btn" name="labSearchforout" value="Buscar" >
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