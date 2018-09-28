<?php 

include './connection.php';

$conn = getConnection();

$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$solicitacao = filter_input(INPUT_POST, 'solicitacao', FILTER_DEFAULT);

$sql = 'INSERT INTO solicitacoes (id_user_fk, email_user_fk, solicitacao) VALUES (?,?,?)';
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $id);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $solicitacao);

$exec = $stmt->execute();
$row = $stmt->rowCount();

if ($exec && $row > 0) {
	logMsg("Feito nova solicitação de filme pelo o usuario '".$nome."', ele diz: '".$solicitacao."'");
	session_start();
	$_SESSION['solicitacao_success'] = true;
	header("Location: http://localhost/pay_for_view/conta.php");
}else{
	logMsg("Erro ao fazer solicitacao do usuario '".$nome."', solicitando: '".$solicitacao."'");
	header("Location: http://localhost/pay_for_view/conta.php");
}

?>
