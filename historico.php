<?php 

include './connection.php';

session_start();

$conn = getConnection();
if (isset($_GET['s'])) {
	$pesquisa = $_GET['s'];
	setcookie('s', $pesquisa);
}
$local = $_GET['l'];
setcookie('back', $local);
$id = $_GET['id'];
$id_user = $_SESSION['id'];

$sql = 'SELECT * FROM historico WHERE id_user_fk = ? ORDER BY id_historico ASC';
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $id_user);

$exec = $stmt->execute();
$row = $stmt->rowCount();
$resutSet = $stmt->fetch();

if ($exec && $row > 0) {

	if ($row == 6) {
		//Maior que 6
		$sql = 'SELECT * FROM historico WHERE id_user_fk = ? AND id_filme_fk = ?';
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(1, $id_user);
		$stmt->bindParam(2, $id);

		$exec = $stmt->execute();
		$row = $stmt->rowCount();

		if ($exec && $row > 0) {
			
			$sql = 'DELETE FROM historico WHERE id_user_fk = ? AND id_filme_fk = ?';
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(1, $id_user);
			$stmt->bindParam(2, $id);

			$exec = $stmt->execute();
			$row = $stmt->rowCount();

			if ($exec && $row > 0) {

				$sql = 'INSERT INTO historico (id_user_fk, id_filme_fk) VALUES (?,?)';
				$stmt = $conn->prepare($sql);

				$stmt->bindParam(1, $id_user);
				$stmt->bindParam(2, $id);

				$exec = $stmt->execute();
				$row = $stmt->rowCount();

				if ($exec && $row > 0) {
					setcookie('filme', $id);
					header("location: reprodutor.php");
				}
			}

		}else{

			$sql = 'DELETE FROM historico WHERE id_user_fk = ? AND id_filme_fk = ?';
			
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(1, $resutSet['id_user_fk']);
			$stmt->bindParam(2, $resutSet['id_filme_fk']);

			$exec = $stmt->execute();
			$row = $stmt->rowCount();

			if ($exec && $row > 0) {
				
				$sql = 'INSERT INTO historico (id_user_fk, id_filme_fk) VALUES (?,?)';
				$stmt = $conn->prepare($sql);

				$stmt->bindParam(1, $id_user);
				$stmt->bindParam(2, $id);

				$exec = $stmt->execute();
				$row = $stmt->rowCount();

				if ($exec && $row > 0) {

					setcookie('filme', $id);
					header("location: reprodutor.php");
				}
			}
		}

	}else{
		//Menor que 6
		$sql = 'SELECT * FROM historico WHERE id_user_fk = ? AND id_filme_fk = ?';
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(1, $id_user);
		$stmt->bindParam(2, $id);

		$exec = $stmt->execute();
		$row = $stmt->rowCount();

		if ($exec && $row > 0) {

			$sql = 'DELETE FROM historico WHERE id_user_fk = ? AND id_filme_fk = ?';
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(1, $id_user);
			$stmt->bindParam(2, $id);

			$exec = $stmt->execute();
			$row = $stmt->rowCount();

			if ($exec && $row > 0) {

				$sql = 'INSERT INTO historico (id_user_fk, id_filme_fk) VALUES (?,?)';
				$stmt = $conn->prepare($sql);

				$stmt->bindParam(1, $id_user);
				$stmt->bindParam(2, $id);

				$exec = $stmt->execute();
				$row = $stmt->rowCount();

				if ($exec && $row > 0) {
					setcookie('filme', $id);
					header("location: reprodutor.php");
				}
			}
		}else{

			$sql = 'INSERT INTO historico (id_user_fk, id_filme_fk) VALUES (?,?)';
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(1, $id_user);
			$stmt->bindParam(2, $id);

			$exec = $stmt->execute();
			$row = $stmt->rowCount();

			if ($exec && $row > 0) {
				setcookie('filme', $id);
				header("location: reprodutor.php");
			}
		}
	}
}else{
	$sql = 'INSERT INTO historico (id_user_fk, id_filme_fk) VALUES (?,?)';
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(1, $id_user);
	$stmt->bindParam(2, $id);

	$exec = $stmt->execute();
	$row = $stmt->rowCount();

	if ($exec && $row > 0) {
		setcookie('filme', $id);
		header("location: reprodutor.php");
	}
}

?>
