<?php

include_once 'Connection.class.php';

/**
* 
*/
class Example
{
	private $idExample;
	private $nameExample;
	
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

	public function createExample()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectExamples()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function editExample()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function deleteExample()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
}