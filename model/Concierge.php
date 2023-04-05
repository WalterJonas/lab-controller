<?php

class Concierge
{
	public function register($name, $email, $password)
	{		
		global $pdo;	
			$sql=$pdo->prepare("INSERT INTO concierge(name, email, password) VALUES(:n, :e, :p)"); //Comando sql (Inserir um registro)
			
			//Substitui as variáveis
			$sql->bindValue(":n", $name);
			$sql->bindValue(":e", $email);
			$sql->bindValue(":p", $password);
			$sql->execute(); //Executa o comando o sql e retorna alguma coisa
			return true; //Retorna true	
	}
}
