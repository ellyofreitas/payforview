<?php

include_once 'Connection.class.php';
include_once 'User.class.php';

class Filme
{
	private $idFilme;
	private $anoFilme;
	private $tituloFilme;
	private $njuntoFilme;
	private $capaImageFilme;
	private $diretorioFilme;
	private $backgroundImageFilme;
	
	private $idUserfk;
	private $idGeneroFk;
	private $idProdutoraFk;

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

	public function createFilme()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectFilmes($dados)
	{
		try 
		{
			for ($i = 0; $i < count($dados); $i++) {
				$sql = 'SELECT * FROM filme f JOIN produtora p ON f.id_produtora_fk = p.id_produtora WHERE id_filme = ?';
				$stmt = $this->conn->getConnection()->prepare($sql);
				$stmt->bindParam(1, $dados[$i]);
				$stmt->execute();
				$result = $stmt->fetch();
				$titulos[] = $result;
			}
			return $titulos;
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectFilmesProdutora($dado)
	{
		try 
		{
			$this->idProdutoraFk = $dado['id_produtora'];
			$sql = 'SELECT * FROM filme WHERE id_produtora_fk = ?';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idProdutoraFk);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function editFilme()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function deleteFilme()
	{
		try 
		{
			
		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
	public function selectFilmesByGenero($dado){
		try {
			$this->idGeneroFk = $dado['id_genero'];
			$sql = 'SELECT id_filme_fk FROM genero_filme WHERE id_genero_fk = ?';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idGeneroFk);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				foreach ($stmt->fetchAll() as $result) {
					$filmes[] = $result['id_filme_fk'];
				}
				return $filmes;
			}else{
				return 0;
			}
		} catch (PDOException $e) {
			return 'Error: '.$e->getMessage();
		}
	}
	public function SelectFilmesForUser()
	{
		try 
		{
			$session = $this->user->SessionUser();
			$this->idUserfk = $session['id_user'];
			$sql = 'SELECT * FROM filme f
			JOIN genero_filme gf
			ON f.id_filme = gf.id_filme_fk
			JOIN genero_user gu
			ON gu.id_genero_fk = gf.id_genero_fk
			WHERE gu.id_user_fk = ? ORDER BY f.titulo ASC';
			$stmt = $this->conn->getConnection()->prepare($sql);
			$stmt->bindParam(1, $this->idUserfk);
			$stmt->execute();
			return $stmt->fetchAll();

		} catch (PDOException $e) 
		{
			return 'Error: '.$e->getMessage();
		}
	}
}