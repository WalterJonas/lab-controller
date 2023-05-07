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
			$dado=$sql->fetch();
			session_start();
			$_SESSION['id']=$dado['id'];
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
