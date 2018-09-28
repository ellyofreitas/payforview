<?php

include_once 'Connection.class.php';

/**
* 
*/
class User
{
	private $nomeUser; 
	private $sobrenomeUser; 
	private $emailUser; 
	private $senhaUser; 
	private $cpfUser; 
	private $planoFkUser;

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
	public function createUser($dados)
	{
		try 
		{
			$this->nomeUser = $dados['nome'];
			$this->sobrenomeUser = $dados['sobrenome'];
			$this->emailUser = $dados['email'];
			$this->senhaUser = $dados['senha'];
			$this->planoFkUser = $dados['plano'];

			$sql =	'SELECT * FROM user WHERE email = ?';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->emailUser);
			
			if ($stmt->execute() && $stmt->rowCount() > 0) {
				return 'email';
			}else{
				$sql = 'INSERT INTO user (nome, sobrenome, email, senha, plano_fk) VALUES (?,?,?,?,?)';
				$stmt = $this->conn->getConnection()->prepare($sql);
				$stmt->bindParam(1, $this->nomeUser);
				$stmt->bindParam(2, $this->sobrenomeUser);
				$stmt->bindParam(3, $this->emailUser);
				$stmt->bindParam(4, $this->senhaUser);
				$stmt->bindParam(5, $this->planoFkUser);
				if ($stmt->execute() && $stmt->rowCount() > 0) {
					return $this->conn->getConnection()->LastInsertId();
				}else{
					return false;
				}
			}
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function loginUser($dados)
	{
		$this->emailUser = $dados['email'];
		$this->senhaUser = $dados['senha'];

		try 
		{
			$sql = 'SELECT * FROM user WHERE email = ? AND senha = ?';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->emailUser);
			$stmt->bindParam(2, $this->senhaUser);
			$stmt->execute();
			if ($stmt->rowCount() == 0) 
			{
				return false;
			}else
			{
				$session = User::StartSessionUser($stmt->fetch());
				if ($session != false) 
				{
					return true;
				}else
				{
					return 'erro session';
				}
			}
		} catch (PDOException $e) 
		{
			echo 'Error: '.$e->getMessage();
		}
	}

	public function StartSessionUser($dados)
	{
		try 
		{
			session_start();
			$_SESSION['cpf'] = $dados['cpf'];
			$_SESSION['nome'] = $dados['nome'];
			$_SESSION['id_user'] = $dados['id_user'];
			$_SESSION['id_plano'] = $dados['plano_fk'];
			$_SESSION['sobrenome'] = $dados['sobrenome'];
			return true;	
		} catch (Exception $e) 
		{
			return false;
		}
		
		
	}
	public function SessionUser()
	{
		if (session_status() != PHP_SESSION_ACTIVE) 
		{
			session_start();
			if (isset($_SESSION['id_user']) && $_SESSION['id_user'] > 0) {
				return $_SESSION;
			}else{
				return false;
			}
		}else
		{
			return $_SESSION;
		}
	}
}

/*
include './connection.php';
$conn = getConnection();

$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

$sql = 'SELECT * FROM user WHERE email=? AND senha=?';

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->bindParam(2, $senha);

$stmt->execute();

if ($ver = $stmt->fetch()){
	session_start();

	$_SESSION['id'] = $ver['id_user'];
	$_SESSION['cpf'] = $ver['cpf'];
	$_SESSION['email'] = $ver['email'];
	$_SESSION['senha'] = $ver['senha'];
	$_SESSION['img_user'] = $ver['img_user'];
	$_SESSION['nome'] = $ver['nome'];
	$_SESSION['sobrenome'] = $ver['sobrenome'];
	$_SESSION['plano'] = $ver['plano_fk'];

	header("Location: /pay_for_view/homepage.php");
} else {
	session_start();
	$_SESSION['error'] = 1;
	$_SESSION['email'] = $email;
	echo "<script>window.location='http://localhost/pay_for_view/login.php';</script>";
}
*/