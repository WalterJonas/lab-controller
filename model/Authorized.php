<?php

class Authorized
{
	public function register($lab, $name, $course, $modality, $level)
	{		
		global $pdo;	
			$sql=$pdo->prepare("INSERT INTO authorized(lab, name, course, modality, level) VALUES(:l, :n, :c, :m, :le)"); //Comando sql (Inserir um registro)
			
			//Substitui as variáveis
			$sql->bindValue(":l", $lab);
			$sql->bindValue(":n", $name);
			$sql->bindValue(":c", $course);
			$sql->bindValue(":m", $modality);
			$sql->bindValue(":le", $level);
			$sql->execute(); //Executa o comando o sql e retorna alguma coisa
			return true; //Retorna true	
	}
}
