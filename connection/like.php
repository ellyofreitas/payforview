<?php 

include './connection.php';

$conn = getConnection();

$id_filme = filter_input(INPUT_POST, 'id_filme', FILTER_DEFAULT);
$id_user = filter_input(INPUT_POST, 'id_user', FILTER_DEFAULT);

$like = 1;

$sql = 'SELECT * FROM avaliacao WHERE id_filme_fk = ? AND id_user_fk = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_filme);
$stmt->bindParam(2, $id_user);
$exec = $stmt->execute();
$row = $stmt->rowCount();

if ($exec && $row > 0) {

	$sql = 'SELECT * FROM avaliacao WHERE id_filme_fk = ? AND id_user_fk = ? AND liked = 1';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $id_filme);
	$stmt->bindParam(2, $id_user);
	$exec = $stmt->execute();
	$row = $stmt->rowCount();

	if($exec && $row > 0){
		$sql = 'UPDATE avaliacao SET liked = 0, desliked = 0 WHERE id_filme_fk = ? AND id_user_fk = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $id_filme);
		$stmt->bindParam(2, $id_user);
		$exec = $stmt->execute();
	}else{

		$sql = 'UPDATE avaliacao SET liked = 1, desliked = 0 WHERE id_filme_fk = ? AND id_user_fk = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $id_filme);
		$stmt->bindParam(2, $id_user);
		$exec = $stmt->execute();
	}


}else{
	$sql = 'INSERT INTO avaliacao (id_filme_fk, id_user_fk, liked) VALUES (?,?,?)';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $id_filme);
	$stmt->bindParam(2, $id_user);
	$stmt->bindParam(3, $like);
	$stmt->execute();

}


?>