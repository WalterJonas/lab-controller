<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada</title>

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

<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: ../index.php");
        exit;
    }
    
    if(isset($_POST['labSearchforint'])) 
    {
        require_once "../controller/Conection.php";
        require_once "../model/classes/Authorized.php";

        $authorized = new Authorized;         
        $conection = new Conection;

        $lab = addslashes($_POST["lab"]);
            
        if(!empty($lab))
        {
            $conection->conect("labcontroller", "localhost", "root", ""); 

            echo "<form action='../model/buttonActions.php' method='POST'>";

            if($authorized->listAuthorized($lab)==false) 
            {
                echo "<h2>Não tem ninguém autorizado para esse lab! </h2>";
            }
            else
            {
                echo "<br>	
						<input class='btn btn-success' type='submit' id='#' name='checkin' value='Registrar Entrada'> 
					</form>";	
            }       
        }         
    }
?>

</body>
</html>