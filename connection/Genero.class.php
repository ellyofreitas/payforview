<?php

include_once 'Connection.class.php';
include_once 'User.class.php';

/**
* 
*/
class Genero
{
	private $idUserFk;
	private $idGenero;
	private $nomeGenero;
	
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

	public function createGenero()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function insertGeneroUser($dados)
	{
		try 
		{
			$this->idUserFk = $dados['user'];
			$this->idGenero = $dados['genero'];

			$sql = 'INSERT INTO genero_user (id_user_fk, id_genero_fk) VALUES (?,?)';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idUserFk);
			$stmt->bindParam(2, $this->idGenero);
			$stmt->execute();
			return true;

		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectGeneros()
	{
		try 
		{
			$sql = 'SELECT * FROM genero ORDER BY nome_genero ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function editGenero()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function deleteGenero()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
}