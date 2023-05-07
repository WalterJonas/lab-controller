<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada</title>
</head>
<body>
<?php
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
						<input type='submit' id='#' name='checkin' value='Registrar Entrada'> 
					</form>";	
            }       
        }         
    }
?>

</body>
</html>