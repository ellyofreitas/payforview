<?php 
session_start();

include './connection.php';

$conn = getConnection();

$id_user = $_SESSION['id'];
$plano = $_POST['plano'];

$sql = 'UPDATE user SET plano_fk = ? WHERE id_user = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $plano);
$stmt->bindParam(2, $id_user);
$exec = $stmt->execute();

if ($exec) {
	$_SESSION['plano_success'] = true;
	$_SESSION['plano'] = $plano;
	header("Location: http://localhost/pay_for_view/conta.php");
}else{
	$_SESSION['plano_error'] = true;
	header("Location: http://localhost/pay_for_view/conta.php");
}


 ?>