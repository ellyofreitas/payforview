<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Squeezebox Portfolio Template | CodyHouse</title>

	<?php include 'css.html'; ?>

</head>
<body>
	<ul id="cd-gallery-items" class="cd-container">
		<?php 
		include 'connection/filmeObj.php';
		include 'connection/generoObj.php';
		$generos = $generoObj->selectGeneros(); 
		foreach ($generos as $result) {
			$filmes = $filmeObj->selectFilmesByGenero($result);
			if ($filmes == 0) {
				continue;
			}
			?>
			<li>
				<ul class="cd-item-wrapper">
					<?php 
					shuffle($filmes);
					$filmes = $filmeObj->selectFilmes($filmes);
					$c = 0;
					$class = array(
						0 => 'cd-item-front',
						1 => 'cd-item-middle',
						2 => 'cd-item-back',
						3 => 'cd-item-out',
					);
					foreach ($filmes as $rs) {
						?>
						<li class="<?php print $class[$c]; ?>"><a href="#0"><img src="../pay_for_view_root/assets/connection/bancodeimagens/<?php print $rs['capa_image']; ?>" alt="Preview image"></a></li>
						<?php
						if ($c >= 3) {
							$c = 3;
						}else{
							$c++;
						}
					} ?>
				</ul> <!-- cd-item-wrapper -->

				<div class="cd-item-info">
					<b><?php print $result['nome_genero']; ?></b>
				</div> <!-- cd-item-info -->

				<nav>
					<ul class="cd-item-navigation">
						<li><a class="cd-img-replace" href="#0">Prev</a></li>
						<li><a class="cd-img-replace" href="#0">Next</a></li>
					</ul>
				</nav>
			</li>
			<?php	
		}
		?>
	</ul>
	<?php include 'script.html'; ?>
</body>
</html>