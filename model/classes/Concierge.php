<?php

class Concierge
{
	private $username;
	private $password;

	public function login($username, $password) 
	{
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM concierge WHERE username = :u AND password = :p"); 

		$sql->bindValue(":u", $username, PDO::PARAM_STR);
		$sql->bindValue(":p", $password, PDO::PARAM_STR);
		$sql->execute(); 
		if($sql->rowCount()>0) 
		{
			//$dado=$sql->fetch(); //Transforma os dados que retornaram do BD em um vetor
			//session_start(); //Inicia uma sessão
			//$_SESSION['id']=$dado['id']; //Inicia sessão com ID_Cliente
			return true;
		}
		else
		{
			return false; 
		}
	}

	public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
         $this->username = filter_var($username, FILTER_SANITIZE_STRIPPED);
    }

	public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
         $this->password = filter_var($password, FILTER_SANITIZE_STRIPPED);
    }
}
