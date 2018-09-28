<?php

session_start();

if ($_SESSION['id'] < 0) {
	$_SESSION['false_aut'] = true;
	header("http://localhost/pay-");
}

include './assets/connection/connection.php';

$conn = getConnection();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Conta | PayForView</title>
	<!-- Icon -->
	<link rel="shortcut icon" href="assets/img/oficial.png">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
	<!-- Css -->
	<link rel="stylesheet" href="assets/css/smoothbox.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/conta.css">
	<link rel="stylesheet" href="assets/css/pretty-checkbox.min.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Glyphicon -->
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<!-- Script's -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/sliding.form.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-notify.js"></script>
	<script>
		    function plano(plano){
      switch (plano){
        case 1: 
        $.notify({
         title: '<strong>Não está mais incluso no seu plano!</strong><br>',
         message: 'Você não mais tem acesso a esse conteúdo, assine o Premium para obter novamente.'
       },
       {
        placement: {
         from: 'top',
         align: 'right',

       },offset: {
        x: 5,
        y: 100
      },
      type: 'info',
      animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
      },
    });
        break;
        case 2: 
        $.notify({
         title: '<strong>Não está mais incluso no seu plano!</strong><br>',
         message: 'Você não mais tem acesso a esse conteúdo, assine o Platina para obter novamente.'
       },
       {
        placement: {
         from: 'top',
         align: 'right',

       },offset: {
        x: 5,
        y: 100
      },
      type: 'info',
      animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
      },
    });
        break;
      }
    }
		$(document).ready(function(){
			$("#input_pesquisar").show();
			mostrar();
		});
		var intervalo = window.setInterval(esconder, 5000);

		function esconder(){
			$("#input_pesquisar").hide("slow");
		};
		function mostrar(){
			$("#input_pesquisar").show("slow");
			clearTimeout(intervalo);
			intervalo = window.setInterval(esconder, 5000);
		};
		function status(){
			$.ajax({
				type: "POST",
				url: 'assets/connection/notify.php',
				data: {status: 1, id_user: <?php echo $_SESSION['id']; ?>}
			});
		}
		function notificacao() {
			var url="assets/connection/notify.php?l=conta&id=<?php echo $_SESSION['id']; ?>";
			jQuery("#notificacao").load(url);
			status();
			$('#sino').addClass('btn-outline-danger');
			$('#sino').removeClass('btn-danger');
			$('#del').css({display: 'none'});
		}
		function cont_notify() {
			var url="assets/connection/cont_notify.php?id=<?php echo $_SESSION['id']; ?>";
			jQuery("#del").load(url);
		}
		window.setInterval('cont_notify()', 1);
		function validate(){
			$('#nome').removeAttr('disabled');
			$('#email').removeAttr('disabled');
			return true;
		}
		function assinar(){
			$('#plano').modal('show');
		}
	</script>
</head>
<body style="overflow:hidden;" <?php if (isset($_GET['assinar'])) {
	echo 'onload="assinar();"';
} ?>>
<?php 

if (isset($_SESSION['plano_success'])) {
	echo '<script>$.notify({
		title: "<b>Plano alterado com sucesso!</b><br>",
		message: "Aproveite o conteúdo do seu novo plano."
	},
	{
		placement: {
			from: "top",
			align: "right",

		},offset: {
			x: 5,
			y: 100
		},
		type: "info",
		animate: {
			enter: "animated fadeInRight",
			exit: "animated fadeOutRight"
		},
	});</script>';
	unset($_SESSION['plano_success']);
}

if (isset($_SESSION['solicitacao_success'])) {
	echo '<script>$.notify({
		title: "<b>Solicitação feita com sucesso!</b><br>",
		message: "Aguarde que estamos trabalhando no seu pedido."
	},
	{
		placement: {
			from: "top",
			align: "right",

		},offset: {
			x: 5,
			y: 100
		},
		type: "info",
		animate: {
			enter: "animated fadeInRight",
			exit: "animated fadeOutRight"
		},
	});</script>';
	unset($_SESSION['solicitacao_success']);
}

if (isset($_SESSION['genero_success'])) {
	echo '<script>$.notify({
		title: "Gêneros alterados com sucesso! <br>",
		message: "Aproveite o conteúdo."
	},
	{
		placement: {
			from: "top",
			align: "right",

		},offset: {
			x: 5,
			y: 100
		},
		type: "info",
		animate: {
			enter: "animated fadeInRight",
			exit: "animated fadeOutRight"
		},
	});</script>';
	unset($_SESSION['genero_success']);
}

 ?>
<!-- Navbar -->
<div id="navbar" class="navbar navbar-inverse fixed-top bg-inverse">
	<div class="col-md-12">
		<nav style="background-color: rgba(0,0,0, 0.3);" class="navbar navbar-fixed-top headroom navbar-expand-lg">
			<!-- Logo -->
			<div class="col-md-1">
				<a class="" href="homepage.php">
					<img class="img-fluid" src="assets/img/oficialBW.png" style="width: 100%; background-color: transparent;">
				</a>
			</div>
			<!-- Logo End -->

			<!-- Base Nav-->
			<div class="col-md-4">
				<ul class="nav nav-tabs nav-pills nav-fill">
					<li class="nav-item">
						<a style="color: #fff;" class="nav-link" href="homepage.php">Home</a>
					</li>
					<li class="nav-item">
						<a style="color: #fff;" class="nav-link" href="filmes.php">Filmes</a>
					</li>
				</ul>
			</div>
			<div class="dropdown col-md">
				<div class="btn-group">
					<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown">
						<i class="fas fa-user fa-fw"></i>
						<?php echo $_SESSION['nome']; echo " "; echo $_SESSION['sobrenome'];  ?>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Conta</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-target="#plano" data-toggle="modal" href="#">Mudar de plano</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-target="#genero" data-toggle="modal" href="#">Mudar de gênero</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php">Sair</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<button id="sino" class="btn btn-outline-danger" onclick="notificacao()" data-toggle="dropdown" type="button" style="margin-left:3%;">
					<i class="far fa-bell fa-fw"></i>
					<span id="del" style="display: none;" class="badge badge-danger"></span>
				</button>
				<div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton" style="height:4px; padding-top: 0;">
					<div class="card">
						<div class="card-header badge-danger" align="center">Notificações</div>
						<div id="notificacao" class="card-body bg-dark" style="height: 450px; overflow: auto;"></div>
					</div>
				</div>
			</div>
			<?php if($_SESSION['plano'] != 1){
				echo '<button class="btn btn-danger" data-toggle="modal" data-target="#plano" style="margin-left: 1%;">Adquira Premium</button>';
			} ?>

			<form id="form_buscar" action="pesquisa.php" method="GET" onmouseover="mostrar()" class="form-inline my-2 my-lg-0 col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text" id="btnGroupAddon"><i class="fas fa-search fa-fw"></i></div>
					</div>
					<input id="input_pesquisar" name="s" onkeypress="mostrar()" class="form-control mr-sm-2" type="search" placeholder="Pesquisar..." aria-label="Search">
				</div>

			</form>
			<!-- Base Nav End -->
		</div>
	</nav>
</div>
</div>
<!-- Navbar End -->
<div class="main" style="padding-top: 93px;">
	<div id="navigation" style="display:none;" class="w3_agile">
		<ul>
			<li class="selected">
				<a href="#"><i class="fa fa-home" aria-hidden="true"></i><span>Conta</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-history" aria-hidden="true"></i><span>Historico</span></a>
			</li>
			<li>
				<a href="#"><i class="fa fa-bullhorn" aria-hidden="true" data-toggle="modal" data-target="#solicitacao"></i><span>Solicitar</span></a>
			</li>
		</ul>
	</div>
	<div id="wrapper" class="w3ls_wrapper w3layouts_wrapper">
		<div id="steps" style="margin:0 auto;" class="agileits w3_steps">
			<form class="w3_form w3l_form_fancy">
				<fieldset class="step agileinfo w3ls_fancy_step">
					<legend>Sua conta </legend> 
					<div class="abt-agile">
						<div class="abt-agile-left" style="">
							<img src="<?php echo $_SESSION['img_user']; ?>" alt="">
						</div>
						<div class="abt-agile-right">
							<h3><?php echo $_SESSION['nome']; echo " "; echo $_SESSION['sobrenome'];  ?></h3>
							<h5><?php
							$sql = 'SELECT * FROM plano WHERE id_plano = ?';
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(1, $_SESSION['plano']);
							$stmt->execute();
							$resultSet = $stmt->fetch();
							echo $resultSet['nome_plano'];
							?></h5>
							<ul class="address">
								<li>
									<ul class="address-text">
										<li><b>GÊNEROS:</b></li>
										<?php

										$sql = "SELECT * FROM genero_user gu JOIN genero g ON g.id_genero = gu.id_genero_fk WHERE id_user_fk = ? ORDER BY nome_genero ASC";
										$stmt = $conn->prepare($sql);
										$stmt->bindParam(1, $_SESSION['id']);
										$stmt->execute();

										$result = $stmt->fetchAll();
										$id = 'NULL';
										echo '<li>';
										foreach ($result as $value) {

											if ($id == $value['id_user_fk']) {
												echo ', ';
												echo $value['nome_genero'];
												$id = $value['id_user_fk'];
											}else{
												echo $value['nome_genero'];
												$id = $value['id_user_fk'];
											}
										}echo '</li>';
										?>
									</ul>
								</li>
								<li>
									<ul class="address-text">
										<li><b>E-MAIL </b></li>
										<li>: <?php echo $_SESSION['email']; ?></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</fieldset>
				<fieldset class="step wthree">
					<legend>Seu Historico</legend>
					<div class="work-w3agile">
						<div class="work-w3agile-top">
							<div class="agileits_w3layouts_work_grid1 w3layouts_work_grid1 hover14 column">
								<div class="w3_agile_work_effect">
									<ul>
										<?php 

										$sql = 'SELECT * FROM filme f JOIN historico h ON f.id_filme = h.id_filme_fk JOIN plano_produtora pp ON f.produtora_fk = pp.id_produtora_fk JOIN plano pl ON pp.id_plano_fk = pl.id_plano WHERE id_user_fk = ?  ORDER BY h.id_historico DESC, pl.id_plano DESC';
										$stmt = $conn->prepare($sql);
										$stmt->bindParam(1, $_SESSION['id']);

										$exec = $stmt->execute();
										$row = $stmt->rowCount();
										$resultSet = $stmt->fetchAll();
										$antigo = 'nada';
										if ($row > 0) {
											foreach ($resultSet as $rs) {
											if ($antigo == $rs['id_filme']) {
												$antigo = $rs['id_filme'];
												continue;
											}else{
												$antigo = $rs['id_filme'];
												if ($rs['id_plano'] >= $_SESSION['plano']) {
													echo '
												<li style="width: 197px; height: 110px;">
												<a href="historico.php?l=conta&id='.$rs['id_filme'].'" class="sb" title="'.$rs['titulo'].'">
												<figure style="width: 197px; height: 110px;">
												<img style="width: 197px; height: 110px;" src="http://localhost/pay_for_view_root/assets/connection/bancodeimagens/'.$rs['capa_image'].'" alt=" " class="img-responsive" />
												</figure>
												</a>
												</li>';
												}else{

												echo '
												<li style="width: 197px; height: 110px;">
												<a href="#" class="sb" title="'.$rs['titulo'].'" onclick="plano('.$rs['id_plano'].')">
												<figure style="width: 197px; height: 110px;">
												<img style="width: 197px; height: 110px; -webkit-filter: grayscale(100%);" src="http://localhost/pay_for_view_root/assets/connection/bancodeimagens/'.$rs['capa_image'].'" alt=" " class="img-responsive" />
												</figure>
												</a>
												</li>';
												}
											}
											}
										}else{
											echo '<h5 style="color: #fff;">Não há historico ainda</h5>';
										}
										?>
										<div class="clear"></div>
									</ul> 
								</div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="solicitacao" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><strong>Solicitar Filme</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="far fa-times-circle fa-fw"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="assets/connection/solicitar.php" method="POST" class="form-control" onsubmit="return validate()">
					<div class="form-group" style="display: none;">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon"><i class="far fa-user fa-fw"></i></div>
							</div>
							<input id="nome" type="text" class="form-control" name="id" value="<?php echo $_SESSION['id']; ?>" required disabled>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon"><i class="far fa-envelope fa-fw"></i></div>
							</div>
							<input id="email" type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" required disabled>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon"><i class="fas fa-film fa-fw"></i></div>
							</div>
							<textarea class="form-control" name="solicitacao" cols="30" rows="10" required></textarea>
						</div>
						<small class="text-muted">Digite o minimo de caracteres que puder!</small>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="far fa-share-square fa-fw"></i> Solicitar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="plano" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><strong>Mudar de plano</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="far fa-times-circle fa-fw"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="assets/connection/edit_plano.php" method="POST" class="form-control">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text" id="btnGroupAddon"><i class="fas fa-ticket-alt fa-fw"></i></div>
							</div>
							<select class="form-control" name="plano" id="">
								<?php 

								$sql = 'SELECT * FROM plano ORDER BY id_plano ASC';
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$resultSet = $stmt->fetchAll();

								foreach ($resultSet as $rs) {
									if ($_SESSION['plano']==$rs['id_plano']) {
										
									}else{
										echo '<option class="form-control" value="'.$rs['id_plano'].'">'.$rs['nome_plano'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="far fa-save fa-fw"></i> Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="genero" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><strong>Mudar de gênero</strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="far fa-times-circle fa-fw"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form action="assets/connection/edit_genero.php" method="POST" class="form-control">
					<div class="form-group">
						<div class="input-group">
							<div class="card">
							<div class="card-body">
								<?php 

								$sql = 'SELECT * FROM genero ORDER BY nome_genero ASC';
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$resultSet = $stmt->fetchAll();
								foreach ($resultSet as $rs) {
									$sql = 'SELECT * FROM genero_user gu JOIN genero g ON gu.id_genero_fk = g.id_genero WHERE id_user_fk = ? AND id_genero_fk = ? ORDER BY nome_genero ASC';
									$stmt = $conn->prepare($sql);
									$stmt->bindParam(1, $_SESSION['id']);
									$stmt->bindParam(2, $rs['id_genero']);
									$stmt->execute();
									$result = $stmt->fetch();
									$row = $stmt->rowCount();
									if ($row > 0) {
										echo "
										<div class='pretty p-icon p-curve p-thick p-smooth'>
										<input class='icheck' autocomplete='off' checked type='checkbox' name='genero".$result['id_genero']."' value='".$result['id_genero']."''/>
										<div class='state p-danger'>
										<i class='icon fas fa-check fa-fw'></i>
										<label>".$result['nome_genero']."</label>
										</div>
										</div>";
									}else{
										echo "
										<div class='pretty p-icon p-curve p-thick p-smooth'>
										<input class='icheck' autocomplete='off' type='checkbox' name='genero".$rs['id_genero']."' value='".$rs['id_genero']."''/>
										<div class='state p-danger'>
										<i class='icon fas fa-check fa-fw'></i>
										<label>".$rs['nome_genero']."</label>
										</div>
										</div>";
									}
								}
								?>
							</div>
								</div>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="far fa-save fa-fw"></i> Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
