<?php

class Conteudo
{
	private $db;
	//ID, Nome e Email do cliente
	private $id_pag;
	
	
	// Método Dependence Injection
	// Classe vai receber um objeto PDO que é a conexão com o banco de dados
	// a partir disso trabalhar com o atributo DB
	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}
	
	public function find($path){
		$query = "Select * from teste where slug=:slug";
		
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':slug', $path);
		$stmt->execute();
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
		
	}
		
	public function conteudo(){
		
	}
	

	
	
	
}