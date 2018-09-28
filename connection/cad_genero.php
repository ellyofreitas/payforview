<?php

	include_once './connection.php';

	$conn = getConnection();

	$sql = 'INSERT INTO genero (nome_genero) VALUES (?)';

    $nome_genero = filter_input(INPUT_POST, 'nome_genero', FILTER_DEFAULT);

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $nome_genero);

	if($stmt->execute()){
		logMsg("Foi inserido no banco em tabela genero(nome_genero: '".$nome_genero."')");
		session_start();
		$_SESSION['success_genero'] = $nome_genero;	
        header("Location: /pay_for_view/add_filme.php");
    }else{
        logMsg("Erro ao inserir: '".$nome_genero."' a tabela genero", "error");
        session_start();
		$_SESSION['error_genero'] = $nome_genero;
		header("Location: /pay_for_view/add_filme.php");
}
