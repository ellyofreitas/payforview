<!DOCTYPE html>
<html>
	<head>
		<title>Adicionar Filme | PayForView</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Icon -->
		<link rel="shortcut icon" href="assets/img/oficial.png">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
		<!-- Css -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/pretty-checkbox.min.css">
		<!-- Glyphicon -->
		<link rel="stylesheet" href="assets/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
		<!-- Script's -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap-notify.js"></script>
		<script>
			function validar(){
				if(jQuery('input[type=checkbox][class=icheck]:checked').length == 0){
					$.notify({
						title: '<strong>Ops!</strong>',
						message: 'Marque alguma opção de gênero'
					},{
						type: 'danger'
					});
					return false;
				}
				if(jQuery('input[type=radio][class=icheck]:checked').length == 0){
					$.notify({
						title: '<strong>Ops!</strong>',
						message: 'Marque alguma opção em produtora'
					},{
						type: 'danger'
					});
					return false;
				}
			}
			$(document).ready(function(){
    			$('[data-toggle="tooltip"]').tooltip(); 
			});
			function genero(){
				$('#genero').modal('show')
			}
			function produtora(){
				$('#produtora').modal('show')
			}
		</script>
	</head>
	<body>
	<?php include_once 'assets/connection/error_success.php'; ?>
		
		<div class="container" style="padding-top: 2%;">
			<form style="background-color: rgba(0,0,0, 0.5);" class="form-control text-center" action="assets/connection/cad_filme.php" method="POST" onsubmit="return validar()">
				<label style="color: #fff;">
					<h2>
						<strong>Adicionar evento</strong>
					</h2>
				</label>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Nome do evento:</div>
						</div>
						<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="event_name" placeholder="Ex: " required/>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Ano:</div>
						</div>
						<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="ano" placeholder="Ex: 2018" required/>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Arquivo Imagem:</div>
						</div>
						<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="imagem" value="http://localhost/bancodeimagens/imagem.jpg" placeholder="Ex: http://localhost/bancodeimagens/imagem.jpg" required/>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Diretorio do Filme:</div>
						</div>
						<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="filme" placeholder="Ex: http://localhost/bancodefilmes/filme.mp4" value="Ex: http://localhost/bancodefilmes/filme.mp4" required/>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Gênero:</div>
						<div class="card-body badge-light" style="border-bottom-right-radius: 100px; ">
						<?php 
						    include_once './assets/connection/connection.php';

							$conn = getConnection();

						    $sql = "SELECT * FROM genero ORDER BY nome_genero ASC";

						    $stmt = $conn->prepare($sql);
						    
						    $stmt->execute();

						    $result = $stmt->fetchAll();

						    foreach ($result as $value) {
						    	echo "
						    	<div class='pretty p-icon p-curve p-tada'>
			        					<input class='icheck' type='checkbox' name='".$value['nome_genero']."'>
			        					<div class='state p-danger-o'>
			           						<i class='icon fas fa-check fa-fw'></i>
			           						<label>".$value['nome_genero']."</label>
			        					</div>
			    				</div>";
						    }
						 ?>
						 <a onclick="genero()">
			        		<i data-toggle="tooltip" data-placement="top" title="Adicionar gênero" class='fas fa-plus text-danger fa-fw'></i>
						 </a>
						</div>
			  			</div>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="btnGroupAddon">Produtora:</div>
						<div class="card-body badge-light" style="border-bottom-right-radius: 100px; ">
						 <a onclick="produtora()">
				 			<i data-toggle="tooltip" data-placement="top" title="Adicionar produtora" class='fas fa-plus text-danger fa-fw'></i>
						 </a>
						</div>
			  			</div>
					</div>
				</div>


				<div class="form-group">
					<div class="input-group">
						<button type="submit" class="btn btn-outline-danger">
							<i class="fas fa-sign-in-alt fa-fw"></i>
							<strong style="color: #fff;">Adicionar Filme</strong>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="modal fade" id="genero" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Adicionar gênero</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="assets/connection/cad_genero.php">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text" id="btnGroupAddon">Nome gênero:</div>
									</div>
									<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="nome_genero" value="" placeholder="Ex: Ação" required/>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-outline-danger">
									<i class="fas fa-sign-in-alt fa-fw"></i>
									<strong>Cancelar</strong>
								</button>
								<button type="submit" class="btn btn-outline-success">
									<i class="fas fa-sign-in-alt fa-fw"></i>
									<strong>Adicionar gênero</strong>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="produtora" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Adicionar Produtora</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="assets/connection/cad_produtora.php">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text" id="btnGroupAddon">Nome produtora:</div>
									</div>
									<input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="nome_produtora" value="" placeholder="Ex: Disney" required/>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-outline-danger">
									<i class="fas fa-sign-in-alt fa-fw"></i>
									<strong>Cancelar</strong>
								</button>
								<button type="submit" class="btn btn-outline-success">
									<i class="fas fa-sign-in-alt fa-fw"></i>
									<strong>Adicionar produtora</strong>
								</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>