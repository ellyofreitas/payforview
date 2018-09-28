<?php
$id = $_COOKIE['filme'];

include './assets/connection/connection.php';

$conn = getConnection();

$sql = "SELECT * FROM filme WHERE id_filme = ?";

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $value) {
	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="UTF-8">
		<title><?php echo $value['titulo']; ?> | Pay For View</title>
		<!-- Icon -->
		<link rel="shortcut icon" href="assets/img/oficial.png">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- Glyphicon -->
		<link rel="stylesheet" href="assets/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
		<!-- Script's -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).keypress(function(e){
					if(e.wich == 32 || e.keyCode == 32){
						play();
						mostrar();
					}
				});
			});
			document.onkeydown = function () {
				switch (event.keyCode) {
    // Bloquea Tecla F11
    case 122 :
    event.returnValue = false;
    event.keyCode = 0;
    return false;
    break;
}};
var intervalo = window.setInterval(esconder, 5000);

function esconder(){
	$("#controls").hide("slow");
	$('html').css({cursor: 'none'});
}
function mostrar(){
	$("#controls").show("slow");
	$('html').css({cursor: 'default'});
	clearTimeout(intervalo);
	intervalo = window.setInterval(esconder, 5000);
}
</script>
</head>
<body style="overflow:hidden;" oncontextmenu="return false;">
	<div style="background-color: black;"><a class="btn btn-outline-danger" style="margin-top: 5px;" href="voltar.php"><i class="fas fa-chevron-left fa-fw"></i></a></div>
	<div id="playerVideo" onmousemove="mostrar()" class="player-video" onmouseover="prepare(this)">

		<video class="video-view" poster="http://localhost/pay_for_view_root/assets/connection/bancodeimagens/<?php echo $value['capa_image'] ?>" preload="none">
			<source src="http://localhost/pay_for_view_root/assets/connection/bancodefilmes/<?php echo $value['src_filme'] ?>" type="video/mp4" />
			</video>

			<div class="video-preloader"></div>

			<div id="controls" onmousemove="mostrar()" class="video-controls">

				<div class="video-progress-bar float-left">
					<div class="video-loader progress-bar bg-secondary"></div>
					<div class="video-progress progress-bar bg-danger"></div>
				</div>

				<div id="playPause" class="video-play float-left video-btn btn btn-outline-danger"></div>
				<div class="video-volume float-left video-btn btn"></div>

				<div class="slider float-left">
					<div class="slider-vol progress-bar bg-danger"></div>
				</div>

				<div id="time" class="video-time float-left">00:00 | 00:00</div>
				<div class="video-time float-left"><?php echo $value['titulo']; }?></div>
				<div class="video-screen float-right video-btn btn"></div>

			</div>
		</div>
	</body>
	</html>