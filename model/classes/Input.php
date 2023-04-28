<?php

class Input
{
	private $lab;
	private $name;
	private $hour;
	private $date;

    public function checkin($lab, $name, $hour, $date)
	{		
		global $pdo;	
        $sql=$pdo->prepare("INSERT INTO input(lab, name, hour, date) VALUES(:l, :n, :h, :d)"); 		
        $sql->bindValue(":l", $lab, PDO::PARAM_STR); 	
        $sql->bindValue(":n", $name, PDO::PARAM_STR); 
        $sql->bindValue(":h", $hour,PDO::PARAM_STR);      
        $sql->bindValue(":d", $date, PDO::PARAM_STR);              
        $sql->execute();
        if($sql->rowCount()>0)
        { 
            $sql=$pdo->prepare("UPDATE status SET situacao='Aberto' WHERE lab=$lab"); 
            $sql->execute();
            return true;      
        }
        else
        {
            return false;          
        }		
	}

    public function listInput($lab)
	{        
		global $pdo;
		$sql=$pdo->prepare("SELECT id, lab, name, hour, date FROM input WHERE lab = :l"); 
				
		$sql->bindValue(":l", $lab, PDO::PARAM_STR);
		$sql->execute(); 

		$tableInput="";
		if($sql->rowCount()>0)
		{
			$tableInput = "<center><table border=1>";
			$tableInput.="
			<tr>
                <td>Selecione</td>				
				<td>Lab</td>
				<td>Nome</td>
				<td>Hora de entrada</td>
                <td>Data</td>
			</tr>";
			while(list($id, $lab, $name, $hour, $date)=$sql->fetch())
			{
            	$tableInput.="           			
		        <tr>
                    <td><center><input type='radio' name='id' value='$id'></td>
		            <td>$lab</td>
		            <td>$name</td>
		            <td>$hour</td>
                    <td>$date</td>
		        </tr>";
			}
			$tableInput.="</table>";

			if($tableInput!="")
			{	
				echo $tableInput;										
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

	public function getHour()
    {
        return $this->hour;
    }
    public function setHour($hour)
    {
         $this->hour = filter_var($hour, FILTER_SANITIZE_STRIPPED);
    }

	public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
         $this->date = filter_var($date, FILTER_SANITIZE_STRIPPED);
    }
}
