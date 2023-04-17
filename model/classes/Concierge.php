<?php

class Concierge
{
	private $username;
	private $password;

	public function login($username, $password) //Email e senha por parametro
	{
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM concierge WHERE username = :u AND password = :p"); //Comando sql

		//Substitui as variáveis
		$sql->bindValue(":u", $username, PDO::PARAM_STR);
		$sql->bindValue(":p", $password, PDO::PARAM_STR);
		$sql->execute(); //Executa o comando o sql e retorna alguma coisa
		if($sql->rowCount()>0) //Conta a quantidade de linhas que retornou do BD (Se retornar algo ele vai logar)
		{
			//entrar no sistema (sessão)
			//$dado=$sql->fetch(); //Transforma os dados que retornaram do BD em um vetor
			//session_start(); //Inicia uma sessão
			//$_SESSION['id']=$dado['id']; //Inicia sessão com ID_Cliente
			return true; //logado com sucesso
		}
		else
		{
			return false; //nao foi possivel logar (Não achou o email e senha no BD)
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
