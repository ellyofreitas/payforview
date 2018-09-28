<?php

include './connection.php';

$conn = getConnection();

$sql = 'INSERT INTO user (nome, sobrenome, email, senha, cpf, plano_fk) VALUES (?,?,?,?,?,?)';

$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
$plano = filter_input(INPUT_POST, 'plano', FILTER_DEFAULT);

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $sobrenome);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $senha);
$stmt->bindParam(5, $cpf);
$stmt->bindParam(6, $plano);

if($stmt->execute()){

	logMsg("Dados inseridos no banco, em tabela user(nome: '".$nome."', sobrenome: '".$sobrenome."', email: '".$email."', senha: '".$senha."', cpf: '".$cpf."', plano: '".$plano."')");

	$sql_user = 'SELECT id_user FROM user WHERE nome = ? AND cpf = ?';

	$stmt_user = $conn->prepare($sql_user);
	$stmt_user->bindParam(1, $nome);
	$stmt_user->bindParam(2, $cpf);

	$stmt_user->execute();

	if ($ver = $stmt_user->fetch()) {

		$sql_gen ="SELECT * FROM genero ORDER BY nome_genero ASC";

		$stmt_gen = $conn->prepare($sql_gen);

		$stmt_gen->execute();

		$result_gen = $stmt_gen->fetchAll();

		foreach ($result_gen as $value_gen) {

			$genero = 'genero'.$value_gen['id_genero'];

			if (isset($_POST[$genero])) {

				$sql_user_gen ="INSERT INTO genero_user (id_user_fk, id_genero_fk) VALUES (?,?)";

				$stmt_user_gen = $conn->prepare($sql_user_gen);
				$stmt_user_gen->bindParam(1, $ver['id_user']);
				$stmt_user_gen->bindParam(2, $value_gen['id_genero']);

				$exec = $stmt_user_gen->execute();
				$row = $stmt_user_gen->rowCount();
				if ($exec && $row > 0) {
					echo 'ok';
					//logMsg("Dados inseridos no banco, em tabela genero_user(id_user_fk: '".$ver['id_user']."', nome_genero_fk: '".$value_gen['nome_genero']."')");
				}else{
					echo 'nao';
					//logMsg("Error ao inserir no banco, em tabela genero_user(id_user_fk: '".$ver['id_user']."', nome_genero_fk: '".$value_gen['nome_genero']."')", "error");
					echo "<script>alert('Error ao inserir no banco, em tabela genero_filme(id_user_fk: '".$ver['id_user']."', nome_genero_fk: '".$value_gen['nome_genero']."')');</script>";
				}
			}
		}
	}
	session_start();
	$_SESSION['success_cad'] = true;
	header("location: http://localhost/pay_for_view/login.php");
}else{
	echo 'Error';
}
