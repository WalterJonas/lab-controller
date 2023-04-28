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
            $tableInput = "<br><br><table border>";		
			while(list($lab, $situacao)=$sql->fetch())
			{
            	$tableInput.="           				      
		            <td>$lab - $situacao </td>
		       ";
			}
			$tableInput.="</table>";
            if($tableInput!="")
			{	
				echo $tableInput;										  				
			}	
        }
	}
}
