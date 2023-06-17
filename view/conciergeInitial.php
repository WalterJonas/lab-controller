<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        nav{
            color: white;
            background-color: #34A553;
            padding: 10px;
        }

        nav a{
            color: white;
        }

        form{
            padding: 20px;
            width: 90%;
            font-weight: 600;
            margin-bottom: 5%;
        }

        form label{
            padding-bottom: 20px;
        }

        .registrer_row{
            width: 95vw;
            margin: auto;
        }

        .btn{
            width: auto;
            height: auto;
            padding: 0;
            margin-top: 5px;
        }

        .btn:hover{
            transition: 1s;
            border: 1px solid black;
            padding: 0;
        }

        .pai{
            margin: auto;
            width: 80%;
        }

        .filho{
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
        }



    </style>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand">lab-controller</a>
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
        <form class="col" action="checkin.php" method="post">
            <label>Registrar Entrada</label>
            <input type="search" class="form-control" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" class="btn" name="labSearchforint" value="Buscar" >
        </form>
        
        <form class="col" action="checkout.php" method="post">
            <label>Registrar Saída</label>
            <input type="search" class="form-control" placeholder="Buscar Laboratório" name="lab" required>
            <input type="submit" class="btn" name="labSearchforout" value="Buscar" >
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

</body>
</html>