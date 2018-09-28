<?php

    include './connection.php';

	$conn = getConnection();

	$teste = ['',''];

	$gravandoTeste = serialize($teste);

	$sql = "INSERT INTO teste (teste) VALUES (?)";

	$stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $gravandoTeste);

    if($stmt->execute()){
        echo 'Salvo';
        $meuTeste = unserialize($gravandoTeste);
        echo '<br>', $meuTeste[0];
        echo '<br>', $meuTeste[1];
    }else {
        echo 'N';
}
    

