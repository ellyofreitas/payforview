<?php 

session_start();

include './connection.php';

$conn = getConnection();

$id_user = $_SESSION['id'];

$sql = 'SELECT * FROM genero ORDER BY nome_genero ASC';
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultSet = $stmt->fetchAll();

foreach ($resultSet as $rs) {
	$genero = 'genero'.$rs['id_genero'];
	if (isset($_POST[$genero])) {
		$sql = 'SELECT * FROM genero_user WHERE id_genero_fk = ? AND id_user_fk = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $rs['id_genero']);
		$stmt->bindParam(2, $id_user);
		$stmt->execute();
		$row = $stmt->rowCount();

		if($row > 0){

		}else{
			$sql = 'INSERT INTO genero_user (id_genero_fk, id_user_fk) VALUES (?,?)';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $rs['id_genero']);
			$stmt->bindParam(2, $id_user);
			$stmt->execute();
		}
	}else{
		$sql = 'SELECT * FROM genero_user WHERE id_genero_fk = ? AND id_user_fk = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $rs['id_genero']);
		$stmt->bindParam(2, $id_user);
		$stmt->execute();
		$row = $stmt->rowCount();
		if($row > 0){
			$sql = 'DELETE FROM genero_user WHERE id_genero_fk = ? AND id_user_fk = ?';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $rs['id_genero']);
			$stmt->bindParam(2, $id_user);
			$stmt->execute();
		}else{
			
		}
	}
}
$_SESSION['genero_success'] = true;
header("location: http://localhost/pay_for_view/conta.php");
?>
