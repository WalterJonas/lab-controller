<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Saída</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
						<input type='submit' id='#' name='checkout' value='Registrar Saída'> 
					</form>
                    
                    <h5>Caso o devolvedor não seja um dos autorizados, registre a saída no caixa de input abaixo</h5>
                    <form action='../model/buttonActions.php' method='post'>
                        <input type='text' id='#' name='lab' placeholder='Lab' value='$lab'> 
                        <input type='text' id='#' name='name' placeholder='Nome'> 
                        <input type='submit' id='#' name='checkout2' value='Registrar Saída'> 
                    </form>";	
            }       
        }   
    }
?>

</body>
</html>