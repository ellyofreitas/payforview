<?php
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
