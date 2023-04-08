<?php
    //Conecta com os arquivos
    require_once "../controller/Conection.php";
    $conection = new Conection;

    if(isset($_POST['login'])) //Se o usuário clicar no botão 
    {
        require_once "../model/classes/Concierge.php";
        $concierge = new Concierge;         
        //php recebe os dados do formulário
        $username = addslashes($_POST["username"]);
        $password = addslashes($_POST["password"]);

        //verifica se esta tudo preenchido
        if(!empty($username) && !empty($password))
        {
            $conection->conect("labcontroller", "localhost", "root", ""); //Conecta com BD               
            if($concierge->login($username, $password)) //Se a função "login" retornar "true"
            {
                header("location: ../view/conciergeInitial.php");//Aparece na tel
            }
            else //Se a função "cadastrar" retornar "false"
            {   
                echo "<script> alert('Senha ou Email incorretos!'); 
                window.location.href='../index.php'; </script>";                                
            }
        }              
    }

    else if(isset($_POST['registerAuthorized'])) //Se o usuário clicar no botão 
    {
        require_once "../model/classes/Authorized.php";
        $authorized = new Authorized;      
        //php recebe os dados do formulário
        $lab = addslashes($_POST["lab"]);
        $name = addslashes($_POST["name"]);
        $course = addslashes($_POST["course"]);
        $modality = addslashes($_POST["modality"]);
        $level = addslashes($_POST["level"]);
       
        //verifica se esta tudo preenchido
        if(!empty($lab) && !empty($name) && !empty($course) && !empty($modality) && !empty($level))
        {
            $conection->conect("labcontroller", "localhost", "root", ""); //Conecta com BD               
            if($authorized->register($lab, $name, $course, $modality, $level)) 
            {
                echo "<script> alert('Cadastro realizado com sucesso!'); 
                window.location.href='../view/registerAuthorized.php'; </script>"; 
            }
            else //Se a função "cadastrar" retornar "false"
            {   
                echo "<script> alert('Não foi possível realizar o cadastro!');
                window.location.href='../view/registerAuthorized.php'; </script>";                                
            }
        }              
    }
    