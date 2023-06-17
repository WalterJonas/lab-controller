<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Saída</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{
            margin: 0;
            padding: 0;
            width: 100vw;
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

        .row{
            justify-content: center;
            margin-top: 10px;
        }

        form{
            width: 100%;
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
    
    if(isset($_POST['labSearchforout'])) 
    {
        require_once "../controller/Conection.php";
        require_once "../model/classes/Authorized.php";
        require_once "../model/classes/Input.php";

        $conection = new Conection;
        $authorized = new Authorized; 
        $input = new Input;             
        
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
						<input type='submit' class='btn btn-success' id='#' name='checkout' value='Registrar Saída'> 
					</form>
                    
                    <hr><br>
                    <h5>Caso o devolvedor não seja um dos autorizados, registre a saída no caixa de input abaixo:</h5>
                    <form class='row g-3' action='../model/buttonActions.php' method='post'>
                    <div class='col-auto'>
                        <input type='text' id='#' class='form-control form-control-sm' name='lab' placeholder='Lab' value='$lab'> 
                    </div>
                    <div class='col-auto'>
                        <input type='text' class='form-control form-control-sm' id='#' name='name' placeholder='Nome'> 
                    </div>
                    <div class='col-auto'>
                        <input type='submit' class='btn btn-warning btn-sm'  id='#' name='checkout2' value='Registrar Saída'> 
                    </div>
                    </form>";	
            }       
        }   
    }
?>
</body>
</html>