<?php

	include './connection.php';

	$conn = getConnection();

    $sql = "SELECT * FROM teste ORDER BY id_teste ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach ($result as $value) {
        echo "<br>id: ".$value['id_teste']."<br>";
        $array = unserialize($value['teste']);
        $count = count($array);
        for ($i=0; $i < $count ; $i++) { 
            echo $array[$i];
            echo " ";
        }
    }


pedro91689356