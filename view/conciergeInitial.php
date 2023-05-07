<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <form action="checkin.php" method="post">
        <label>Registrar Entrada</label>
        <input type="search" placeholder="Buscar Laboratório" name="lab" required>
        <input type="submit" name="labSearchforint" value="Buscar" >
    </form>
    <form action="checkout.php" method="post">
        <label>Registrar Saída</label>
        <input type="search" placeholder="Buscar Laboratório" name="lab" required>
        <input type="submit" name="labSearchforout" value="Buscar" >
    </form>
    <a href="registerAuthorized.php">Cadastrar autorizados para acessar os laboratótios</a>
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