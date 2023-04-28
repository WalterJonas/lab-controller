<?php

class Status
{
	private $lab;
	private $situacao;

    public function viewStatus()
	{	
		global $pdo;	
        $sql=$pdo->prepare("SELECT lab, situacao FROM status"); 		
        $sql->execute();
        if($sql->rowCount()>0)
        { 
           
            $tableInput = "<center><table border=1>";
			
			while(list($lab, $situacao)=$sql->fetch())
			{
            	$tableInput.="           			
		        <tr>
		            <td>$lab</td>
		            <td>$situacao</td>
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
}