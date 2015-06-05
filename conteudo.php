<?php

class Conteudo
{
	private $db;
	//ID, Nome e Email do cliente
	private $id_pag;
	
	
	// M�todo Dependence Injection
	// Classe vai receber um objeto PDO que � a conex�o com o banco de dados
	// a partir disso trabalhar com o atributo DB
	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}
	
	public function find($path){
		$query = "Select * from teste where slug=:slug";
		
                // prepara para ser executado
		$stmt = $this->db->prepare($query);
                // ligar valores, ligar a variável ao apelido (marker) colocar na query
		$stmt->bindValue(':slug', $path);
		// executa a query
                $stmt->execute();
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
		
	}
	
        public function buscar($pal){
                /* TENTATIVA DE BIND VALUE, NÃO FUNCIONOU
                $busca = filter_input(INPUT_POST, 'busca');
                $stmt = $this->db->prepare("SELECT * FROM teste WHERE conteudo LIKE :busca");
                $stmt->bindValue(':busca', "%{$busca}%");
                $stmt->execute();
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                */
		$query = "Select * from teste where conteudo LIKE '%".$pal."%' ORDER BY nome";
		
		$stmt = $this->db->prepare($query);
		//$stmt->bindValue(':palavra', $pal);
		$stmt->execute();
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
	}
        
	public function conteudo(){
		
	}
        
        
	

	
	
	
}