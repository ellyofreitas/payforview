<?php

include_once 'User.class.php';
include_once 'Plano.class.php';
include_once 'Filme.class.php';
include_once 'Produtora.class.php';
include_once 'Connection.class.php';

/**
* 
*/
class Functions
{
	private $idFunctions;
	private $nameFunctions;
	
	function __construct()
	{
		$this->user = new User();
		$this->filme = new Filme();
		$this->plano = new Plano();
		$this->conn = new Connection();
		$this->produtora = new Produtora();
	}
	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function __get($atributo)
	{	
		return $this->$atributo;
	}

	public function homepage(){
		try {
			$session = $this->user->SessionUser();
			$filme = $this->filme->SelectFilmesForUser();
			foreach ($filme as $rs) {
				$id_filme[] = $rs['id_filme']; 
			}
			$genero = array_values(array_unique($id_filme));
			$produtoras = $this->produtora->selectProdutorasPlano();
			foreach ($produtoras as $rs) {
				$filmes = $this->filme->SelectFilmesProdutora($rs);
				foreach ($filmes as $value) {
					$plano[] = $value['id_filme'];
				}
			}
			$home = array_intersect($genero, $plano);

			$filmes = $this->filme->SelectFilmes(array_values($home));
			return $filmes;
		} catch (PDOException $e) {
			return 'Error '.$e->getMessage();
		}
	}
}