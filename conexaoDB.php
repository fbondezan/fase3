<?php 

//conexao com o PDO - Banco de Dados


		try {
	$conexao = new \PDO("mysql:host=localhost;dbname=fase3", "root", "1meapmu8sw");
		
} catch (\PDOException $e) {
	// die, usado para parar a minha aplica��o
	die("N�o foi poss�vel estabelecer a conex�o com o bando de dados\n");
}

