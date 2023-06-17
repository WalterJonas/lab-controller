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



	public function inputRecords($lab)
	{        
		global $pdo;
		$sql=$pdo->prepare("SELECT lab, name, hour, date FROM input WHERE lab = :l ORDER BY id DESC"); 
		$sql->bindValue(":l", $lab, PDO::PARAM_STR);
		$sql->execute(); 	
		$tableRecords="";
		if($sql->rowCount()>0)
		{
			$tableRecords = "<center><table class='table table-hover'>";
			$tableRecords.="
			<thead>
                <tr>		
                    <th>Lab</th>
                    <th>Nome</th>
                    <th>Hora de entrada</th>
                    <th>Data</th>						
                </tr>
            </thead>
			<tbody>";
			
			while(list($lab, $name, $hour, $date)=$sql->fetch())
			{
            	$tableRecords.="           			
		        <tr>	
		            <td>$lab</td>
		            <td>$name</td>
		            <td>$hour</td>
                    <td>$date</td>												
		        </tr>";
			}
			$tableRecords.="</tbody></table>";

			if($tableRecords!="")
			{	
				echo $tableRecords;											
				return true;     				
			}
			else
			{
				return false;
			}
		}			
	}

	public function outputRecords($lab)
	{        
		global $pdo;
		$sql=$pdo->prepare("SELECT lab, name, hour, date FROM output WHERE lab = :l ORDER BY id DESC"); 
		$sql->bindValue(":l", $lab, PDO::PARAM_STR); 
		$sql->execute(); 	
		$tableRecords="";
		if($sql->rowCount()>0)
		{
			$tableRecords = "<center><table";
			$tableRecords.="
			<thead>
                <tr>		
                    <th>Lab</td>
                    <th>Nome</td>
                    <th>Hora de saída</td>
                    <th>Data</td>						
                </tr>
            </thead>
			<tbody>";
			while(list($lab, $name, $hour, $date)=$sql->fetch())
			{
            	$tableRecords.="           			
		        <tr>	
		            <td>$lab</td>
		            <td>$name</td>
		            <td>$hour</td>
                    <td>$date</td>												
		        </tr>";
			}
			$tableRecords.="</tbody></table>";

			if($tableRecords!="")
			{	
				echo $tableRecords;											
				return true;     				
			}
			else
			{
				return false;
			}
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
