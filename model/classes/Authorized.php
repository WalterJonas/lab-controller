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
			$sql=$pdo->prepare("INSERT INTO authorized(lab, name, course, modality, level)
             VALUES(:l, :n, :c, :m, :le)"); 
			
			$sql->bindValue(":l", $lab, PDO::PARAM_STR);
			$sql->bindValue(":n", $name, PDO::PARAM_STR);
			$sql->bindValue(":c", $course, PDO::PARAM_STR);
			$sql->bindValue(":m", $modality, PDO::PARAM_STR);
			$sql->bindValue(":le", $level, PDO::PARAM_STR);
			$sql->execute(); 
			return true;
	}
    
    public function listAuthorized($lab)
	{        
		global $pdo;
		$sql=$pdo->prepare("SELECT id, lab, name, course, modality, level FROM authorized
    	WHERE lab = :l"); 
				
		$sql->bindValue(":l", $lab, PDO::PARAM_STR);
		$sql->execute(); 

		$tableAuthorized="";
		if($sql->rowCount()>0)
		{
			$tableAuthorized = "<center><table";
			$tableAuthorized.="
			<thead>
                <tr>
                    <th>Selecione</td>				
                    <th>Lab</td>
                    <th>Nome</td>
                    <th>Curso</td>
                    <th>Modalidade</td>
					<th>Nível</td>
                </tr>
            </thead>
			<tbody>";
			while(list($id, $lab, $name, $course, $modality, $level)=$sql->fetch())
			{
            	$tableAuthorized.="           			
		        <tr>
                    <td><input type='radio' name='id' value='$id'></td>
		            <td>$lab</td>
		            <td>$name</td>
		            <td>$course</td>
                    <td>$modality</td>
                    <td>$level</td>
		        </tr>";
			}
			$tableAuthorized.="</tbody></table>";

			if($tableAuthorized!="")
			{	
				echo $tableAuthorized;											
				return true;     				
			}
			else
			{
				return false;
			}
		}			
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
