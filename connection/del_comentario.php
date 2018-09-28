<?php 
include './connection.php';

$conn = getConnection();

$id = $_POST['id'];

$sql = 'DELETE FROM comentarios WHERE id_comentario = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);

$exec = $stmt->execute();
$row = $stmt->rowCount();

if ($exec && $row > 0) {
	echo 'sim';
}else{
	echo 'nao';
}
?>