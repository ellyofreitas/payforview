<?php

	include_once './connection.php';

	$conn = getConnection();

	$sql = 'INSERT INTO produtora (nome_produtora) VALUES (?)';

    $nome_produtora = filter_input(INPUT_POST, 'nome_produtora', FILTER_DEFAULT);

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $nome_produtora);

	if($stmt->execute()){
		logMsg("Foi inserido no banco em tabela produtora(nome_produtora: '".$nome_produtora."')");
		session_start();
		$_SESSION['success_produtora'] = $nome_produtora;	
        header("Location: /pay_for_view/add_filme.php");
    }else{
        logMsg("Erro ao inserir: '".$nome_produtora."' a tabela produtora", "error");
        session_start();
		$_SESSION['error_produtora'] = $nome_produtora;
		header("Location: /pay_for_view/add_filme.php");
}
