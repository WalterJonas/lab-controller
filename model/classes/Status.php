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
            $tableInput = "<h3>Status Atual</h3><div class='flex-grid'>";		
			while(list($lab, $situacao)=$sql->fetch())
			{
				if($situacao == "Aberto"){
					$tableInput.="           	
					<div class='filho'><p>Sala: $lab</p>
					<img src='./img/escudo.png' alt='aberto'></div>			      
		       		";
				}else if($situacao == "Fechado"){
					$tableInput.="           	
					<div class='filho'><p>Sala: $lab</p>
					<img src='./img/fechadas.png' alt='aberto'></div>			      
		       		";
				}
			}
			$tableInput.="</div>";
            if($tableInput!="")
			{	
				echo $tableInput;										  				
			}	
        }
	}
}
