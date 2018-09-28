<?php
include 'filmeObj.php';
include 'planoObj.php';
include 'produtoraObj.php';

$session['id_user'] = 1;
$session['id_plano'] = 2;
$filme = $filmeObj->SelectFilmesForUser($session);
foreach ($filme as $rs) {
	$id_filme[] = $rs['id_filme']; 
}
$genero = array_values(array_unique($id_filme));
$produtoras = $produtoraObj->selectProdutorasPlano($session);
foreach ($produtoras as $rs) {
	$filmes = $filmeObj->SelectFilmesProdutora($rs);
	foreach ($filmes as $value) {
		$plano[] = $value['id_filme'];	
	}
}

$home = array_intersect($genero, $plano);
$titulos = $filmeObj->SelectFilmes(array_values($home));

foreach ($titulos as $value) {
	print $value['titulo'].' - '.$value['ano'].' - '.$value['njunto'].' - '.$value['capa_image'].' - '.$value['nome_produtora'];
	print '<br>';
}
?>