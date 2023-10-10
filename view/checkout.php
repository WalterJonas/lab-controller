<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Saída</title>

    <link rel="stylesheet" href="./style/chekout.css">

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
                  
            echo "<main> <form action='../model/buttonActions.php' method='POST'>";

            if($authorized->listAuthorized($lab)==false) 
            {
                echo "<div class='not-found'><img src='./img/error.png' alt='aberto'><h2>Não tem ninguém autorizado para esse lab! </h2> </div>";
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
                    </form> </main>";	
            }       
        }   
    }
?>

    <script src="./JS/mobile-navbar.js"></script>
</body>
</html>