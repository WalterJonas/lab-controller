<?php

use \PDO;
use \PDOException;

class Conection
{
	public $msgErro = "";

	public function conect($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try
		{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
		}
		catch (PDOException $e) 
		{
			$msgErro=$e->getMessage();
		}
	}
}
?>
