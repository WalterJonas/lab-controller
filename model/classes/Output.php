<?php

class Output
{
	private $lab;
	private $name;
	private $hour;

    public function checkout($lab, $name, $hour)
	{		
		global $pdo;	
        $sql=$pdo->prepare("INSERT INTO output(lab, name, hour) VALUES(:l, :n, :h)"); 		
        $sql->bindValue(":l", $lab, PDO::PARAM_STR); 	
        $sql->bindValue(":n", $name, PDO::PARAM_STR); 
        $sql->bindValue(":h", $hour,PDO::PARAM_STR);        
        $sql->execute();
        if($sql->rowCount()>0)
        { 
            $sql=$pdo->prepare("UPDATE status SET situacao='Fechado' WHERE lab=$lab"); 
            $sql->execute();
            return true;
        }
        else
        {
            return false;          
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

	public function getHour()
    {
        return $this->hour;
    }
    public function setHour($hour)
    {
         $this->hour = filter_var($hour, FILTER_SANITIZE_STRIPPED);
    }
}
