<?php

class Student
{
	public function register($name, $email, $password, $category)
	{		
		global $pdo;	
			$sql=$pdo->prepare("INSERT INTO student(name, email, password, category) VALUES(:n, :e, :p, :c)"); //Comando sql (Inserir um registro)
			
			//Substitui as variáveis
			$sql->bindValue(":n", $name);
			$sql->bindValue(":e", $email);
			$sql->bindValue(":p", $password);
			$sql->bindValue(":c", $category);
			$sql->execute(); //Executa o comando o sql e retorna alguma coisa
			return true; //Retorna true	
	}
}
