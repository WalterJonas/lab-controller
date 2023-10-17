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
					<form action='checkout.php' method='post'>
							
						<input type='hidden' name='lab' value='$lab' required>
												
						<div class='filho'><p>Sala: $lab</p>
							<button type='submit' name='labSearchforout'>	
								<img src='./img/escudo.png' alt='aberto'>
							</button>	 
						</div>
						     
					</form>       ";
				}else if($situacao == "Fechado"){
					$tableInput.=" 
					<form action='checkin.php' method='post'>
							
						<input type='hidden' name='lab' value='$lab' required>  

						<div class='filho'><p>Sala: $lab</p>
							<button type='submit' name='labSearchforint'>	
								<img src='./img/fechadas.png' alt='aberto'>	
							</button>
						</div>

					</form>         
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
