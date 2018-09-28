<?php 

	/**
	* Conexão
	*/
	class Connection
	{
		private $usuario;
		private $senha;
		private $banco;
		private $servidor;
		private static $pdo;

		public function __construct()
		{
			$this->servidor = 'localhost';
			$this->banco = 'pay_for_view';
			$this->usuario = 'root';
			$this->senha = 'root';
		}

		public function getConnection()
		{
			try
			{
				if(is_null(self::$pdo)){
					self::$pdo = new PDO ("mysql:host=".$this->servidor.";dbname=".$this->banco."; charset=utf8", $this->usuario, $this->senha);
				}
				return self::$pdo;
			}catch (PDOException $e)
			{
				echo 'Error: '.$e->getMessage();
			}
		}

	}

	
	/*
	// @return \PDO
	function getConnection(){
		$dsn = 'mysql:host=localhost; dbname=pay_for_view; charset=utf8';
		$user = 'root';
		$pass = 'root';

		try{
			$pdo = new PDO($dsn, $user, $pass);
			return $pdo;
		}catch (PDOException $ex){
			echo 'Erro: '.$ex->getMessage();
		}
	}*/


	/*function logMsg( $msg, $level = 'info', $file = 'main.log' ){
	    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
		$levelStr = '';

	    // verifica o nível do log
		switch ( $level )
		{
			case 'info':
	            // nível de informação
			$levelStr = 'INFO';
			break;

			case 'warning':
	            // nível de aviso
			$levelStr = 'WARNING';
			break;

			case 'error':
	            // nível de erro
			$levelStr = 'ERROR';
			break;
		}

	    // data atual
		$date = date( 'Y-m-d H:i:s' );

	    // formata a mensagem do log
	    // 1o: data atual
	    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
	    // 3o: a mensagem propriamente dita
	    // 4o: uma quebra de linha
		$msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

	    // escreve o log no arquivo
	    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
		file_put_contents( $file, $msg, FILE_APPEND );
	}*/