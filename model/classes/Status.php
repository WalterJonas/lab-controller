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
            $tableInput = "<div class='d-flex justify-content-between pai'>";		
			while(list($lab, $situacao)=$sql->fetch())
			{
            	$tableInput.="           	
					<div class='filho'><p>$lab - $situacao </p></div>			      
		       ";
			}
			$tableInput.="</div>";
            if($tableInput!="")
			{	
				echo $tableInput;										  				
			}	
        }
	}
}
