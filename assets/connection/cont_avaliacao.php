<?php 

include './connection.php';

$conn = getConnection();

$t = $_GET['t'];
$id_filme = $_GET['id'];
$sql = 'SELECT SUM(liked) as nl, SUM(desliked) as nd FROM avaliacao WHERE id_filme_fk = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_filme);
$stmt->execute();
$resultSet = $stmt->fetch();

if ($t == 'like') {
	echo $resultSet['nl'];
}else{
	echo $resultSet['nd'];

}

?>