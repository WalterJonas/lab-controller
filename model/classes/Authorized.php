<?php

class Authorized
{
	private $lab;
	private $name;
	private $course;
	private $modality;
	private $level;

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

	public function getLab()
    {
        return $this->lab;
    }
    public function setLab($lab)
    {
         $this->lab = filter_var($lab, FILTER_SANITIZE_STRIPPED);
    }

	public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
         $this->name = filter_var($name, FILTER_SANITIZE_STRIPPED);
    }

	public function getCourse()
    {
        return $this->course;
    }
    public function setCourse($course)
    {
         $this->course = filter_var($course, FILTER_SANITIZE_STRIPPED);
    }

	public function getModality()
    {
        return $this->modality;
    }
    public function setModality($modality)
    {
         $this->modality = filter_var($modality, FILTER_SANITIZE_STRIPPED);
    }

	public function getLevel()
    {
        return $this->level;
    }
    public function setLevel($level)
    {
         $this->level = filter_var($level, FILTER_SANITIZE_STRIPPED);
    }
}
