<?php
    require_once "../controller/Conection.php";
    $conection = new Conection;

    $conection->conect("labcontroller", "localhost", "root", ""); 

    if(isset($_POST['login'])) 
    {
        require_once "../model/classes/Concierge.php";
        $concierge = new Concierge;         
       
        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);
     
        if(!empty($username) && !empty($password))
        {
            if($concierge->login($username, $password)) 
            {
                header("location: ../view/conciergeInitial.php");
            }
            else 
            {   
                echo "<script> alert('Senha ou Email incorretos!'); 
                window.location.href='../index.php'; </script>";                                
            }
        }              
    }

    else if(isset($_POST['registerAuthorized'])) 
    {
        require_once "../model/classes/Authorized.php";
        $authorized = new Authorized;      
       
        $lab = addslashes($_POST["lab"]);
        $name = addslashes($_POST["name"]);
        $course = addslashes($_POST["course"]);
        $modality = addslashes($_POST["modality"]);
        $level = addslashes($_POST["level"]);
       
        if(!empty($lab) && !empty($name) && !empty($course) && !empty($modality) && !empty($level))
        {            
            if($authorized->register($lab, $name, $course, $modality, $level)) 
            {
                echo "<script> alert('Cadastro realizado com sucesso!'); 
                window.location.href='../view/registerAuthorized.php'; </script>"; 
            }
            else 
            {   
                echo "<script> alert('Não foi possível realizar o cadastro!');
                window.location.href='../view/registerAuthorized.php'; </script>";                                
            }
        }              
    }

    else if(isset($_POST['checkin']))
    {
        require_once "../model/classes/Input.php";
        $input = new Input;      

        $id = $_POST["id"];
        $sql=$pdo->prepare("SELECT lab, name FROM authorized WHERE id = :id"); 
        $sql->bindValue(":id", $id);
        $sql->execute(); 
        if($sql->rowCount()>0)
        { 
            list($lab, $name)=$sql->fetch();
            $sql=$pdo->prepare("SELECT id FROM status WHERE lab='$lab' AND situacao='Aberto'"); 
            $sql->execute(); 
            if($sql->rowCount()<1)
            {   
                date_default_timezone_set('America/Manaus');
                $date = date('d/m/Y');
                $hour= date('H:i');
                if($input->checkin($lab, $name, $hour, $date)==true)
                {
                    echo "<script> alert('Entrada registrada com sucesso!'); 
                    window.location.href='../view/conciergeInitial.php'; </script>";
                }  
                else
                {
                    echo "<script> alert('Erro ao registrar entrada!');
                    window.location.href='../view/conciergeInitial.php'; </script>";
                }    
            }
            else 
            {
                echo "<script> alert('O laboratório $lab já está aberto!'); 
                window.location.href='../view/conciergeInitial.php'; </script>";
            }         
        }				
    } 
    