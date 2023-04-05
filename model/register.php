<?php
    //Conecta com os arquivos
    require_once '../controller/Conection.php';
    require_once "../model/Student.php";
    require_once "../model/Concierge.php";
    //require __DIR__ . "model/autoload.php";

    //Instancias
    $student = new Student;  
    $concierge = new Concierge;                     
    $conection = new Conection;

    if(isset($_POST['registerStudent'])) //Se o usuário clicar no botão 
    {
        //php recebe os dados do formulário
        $name = addslashes($_POST["name"]);
        $email = addslashes($_POST["email"]);
        $password = addslashes($_POST["password"]);
        $confPassword = addslashes($_POST["confpassword"]);
        $category = addslashes($_POST["category"]);

        //verifica se esta tudo preenchido
        if(!empty($name) && !empty($email) && !empty($password) && !empty($confPassword) && !empty($category))
        {
            $conection->conect("labcontroller", "localhost", "root", ""); //Conecta com BD               
            if($password == $confPassword) //Verifica se a senha que usuário digitou confere com a senha que ele confirmou
            {
                if($student->register($name, $email, $password, $category)) //Se a função "cadastrar" retornar "true"
                {
                    echo "Cadastro Realizado com Sucesso!"; //Aparece na tela
                }
                else //Se a função "cadastrar" retornar "false"
                {                                  
                    echo "Email já existe!";
                }
            }
            else //Se a senha e confimar não forem iguais
            {
                echo "Senhas não correspondem!";  
            }                
        }
        else //Se faltar um campo para ser preenchido
        {
            echo"<script> alert('Preencha todos os campos!'); window.location.href='../View/TelasCliente/TelaCadastroCliente.php'; </script>";                                 
        }
    }

    else if(isset($_POST['registerConcierge'])) //Se o usuário clicar no botão 
    {
        //php recebe os dados do formulário
        $name = addslashes($_POST["name"]);
        $email = addslashes($_POST["email"]);
        $password = addslashes($_POST["password"]);
        $confPassword = addslashes($_POST["confpassword"]);

        //verifica se esta tudo preenchido
        if(!empty($name) && !empty($email) && !empty($password) && !empty($confPassword))
        {
            $conection->conect("labcontroller", "localhost", "root", ""); //Conecta com BD               
            if($password == $confPassword) //Verifica se a senha que usuário digitou confere com a senha que ele confirmou
            {
                if($concierge->register($name, $email, $password)) //Se a função "cadastrar" retornar "true"
                {
                    echo "Cadastro Realizado com Sucesso!"; //Aparece na tela
                }
                else //Se a função "cadastrar" retornar "false"
                {                                  
                    echo "Email já existe!";
                }
            }
            else //Se a senha e confimar não forem iguais
            {
                echo "Senhas não correspondem!";  
            }                
        }
        else //Se faltar um campo para ser preenchido
        {
            echo"<script> alert('Preencha todos os campos!'); window.location.href='../View/TelasCliente/TelaCadastroCliente.php'; </script>";                                 
        }
    }