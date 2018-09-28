<?php

include_once 'Connection.class.php';
include_once 'User.class.php';

/**
* 
*/
class Produtora
{
	private $idProdutora;
	private $nomeProdutora;
	
	function __construct()
	{
		$this->conn = new Connection();
		$this->user = new User();
	}
	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function __get($atributo)
	{	
		return $this->$atributo;
	}

	public function createProdutora()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectProdutora($dado)
	{
		try 
		{
			$this->idProdutora = $dado['id_produtora_fk'];
			$sql = 'SELECT * FROM produtora WHERE id_produtora = ? ORDER BY nome_produtora ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idProdutora);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectProdutorasPlano()
	{
		try 
		{
			$session = $this->user->SessionUser();
			$this->idPlanoFk = $session['id_plano'];
			$sql = 'SELECT * FROM plano_produtora pp JOIN produtora p ON pp.id_produtora_fk = p.id_produtora WHERE id_plano_fk = ? ORDER BY nome_produtora ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idPlanoFk);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function editProdutora()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function deleteProdutora()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
}