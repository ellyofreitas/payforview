<?php

session_start();

include './connection.php';

$conn = getConnection();

$id_filme = $_GET['id'];

$sql = 'SELECT * FROM comentarios c JOIN user u ON c.id_user_fk = u.id_user WHERE id_filme_fk = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_filme);

$exec = $stmt->execute();
$row = $stmt->rowCount();
$resultSet = $stmt->fetchAll();
$cont = 0;
if ($exec && $row > 0) {
	foreach ($resultSet as $rs) {
		if ($_SESSION['id']==$rs['id_user']) {
			if ($cont==0) {
				echo '<div class="card" id="com'.$rs['id_comentario'].'">
				<div class="card-header">'.$rs['nome'].' '.$rs['sobrenome'].' <button onclick="apagar_comentario('.$rs['id_comentario'].')" class="btn btn-danger float-right"><i class="fas fa-trash fa-fw"></i></button></div>
				<div class="card-body">'.$rs['comentario'].'</div>
				</div>';
				$cont++;
			}else{
				echo '<div class="card" style="margin-top: 5px;" id="com'.$rs['id_comentario'].'">
				<div class="card-header">'.$rs['nome'].' '.$rs['sobrenome'].' <button onclick="apagar_comentario('.$rs['id_comentario'].')" class="btn btn-danger float-right"><i class="fas fa-trash fa-fw"></i></button></div>
				<div class="card-body">'.$rs['comentario'].'</div>
				</div>';
				$cont++;
			}
		}else{
			if ($cont==0) {
				
				echo '<div class="card">
				<div class="card-header">'.$rs['nome'].' '.$rs['sobrenome'].'</div>
				<div class="card-body">'.$rs['comentario'].'</div>
				</div>';
			}else{
				echo '<div class="card" style="margin-top: 5px;">
				<div class="card-header">'.$rs['nome'].' '.$rs['sobrenome'].'</div>
				<div class="card-body">'.$rs['comentario'].'</div>
				</div>';
			}

		}
	}
}else if($exec && $row == 0){
	echo '<div class="card-header">Não há comentarios</div>';
}else{
	echo 'Acho que nao hein';
}
?>