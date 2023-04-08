<?php

class Conection
{
	public $msgErro = "";

	public function conect($name, $host, $user, $password)
	{
		global $pdo;
		try
		{
			$pdo = new PDO("mysql:dbname=".$name.";host=".$host, $user, $password);
		}
		catch (PDOException $e) 
		{
			$msgErro=$e->getMessage();
		}
	}
}
