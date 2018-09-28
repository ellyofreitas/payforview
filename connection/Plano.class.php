<?php

include_once 'Connection.class.php';

/**
* 
*/
class Plano
{
	private $idPlano;
	private $nomePlano;
	private $idProdutoraFk;

	function __construct()
	{
		$this->conn = new Connection();
	}
	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function __get($atributo)
	{	
		return $this->$atributo;
	}

	public function createPlano($dados)
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			echo 'Error: '.$e->getMessage();
		}
	}
	public function selectPlanos()
	{
		try 
		{
			$sql = 'SELECT * FROM plano ORDER BY id_plano ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
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
			$sql = 'SELECT * FROM plano ORDER BY id_plano ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function editPlano($dados)
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			echo 'Error: '.$e->getMessage();
		}
	}
	public function deletePlano($dado)
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			echo 'Error: '.$e->getMessage();
		}
	}
}