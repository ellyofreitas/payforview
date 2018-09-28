<?php 
include './connection.php';

$conn = getConnection();

$id_user = $_POST['id_user'];
$id_filme = $_POST['id_filme'];
$comentario = $_POST['comentario'];

$sql = 'INSERT INTO comentarios (id_user_fk, id_filme_fk, comentario) VALUES(?,?,?)';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_user);
$stmt->bindParam(2, $id_filme);
$stmt->bindParam(3, $comentario);

$exec = $stmt->execute();
$row = $stmt->rowCount();

if ($exec && $row > 0) {
	echo 'sim';
}else{
	echo 'nao';
}
?>