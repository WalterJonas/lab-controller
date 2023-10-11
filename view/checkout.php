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
                <li><a href="./conciergeInitial.php">Home</a></li>
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
                  
            echo "<main><h3>Usuários com Autorização</h3> <form action='../model/buttonActions.php' method='POST'>";

            if($authorized->listAuthorized($lab)==false) 
            {
                echo "<div class='not-found'><img src='./img/error.png' alt='aberto'><h2>Não tem ninguém autorizado para esse lab! </h2> </div>";
            }
            else
            {
                echo "	
					<input type='submit' class='btn btn-success' id='#' name='checkout' value='Registrar Saída'> 
					</form>
                    
                    <div class='form-saida'><h2>Caso não exista na tabela, registrar abaixo:</h2>
                    <form action='../model/buttonActions.php' method='post'>
                    <div class='input-saida'>
                        <input type='text' id='#' name='lab' placeholder='Lab' value='$lab'> 
                    
                        <input type='text' id='#' name='name' placeholder='Nome'> 
                    
                        <input type='submit' id='#' name='checkout2' value='Registrar Saída'> 
                    </div>
                    </div>
                    </form> </main>";	
            }       
        }   
    }
?>

    <script src="./JS/mobile-navbar.js"></script>
</body>
</html>