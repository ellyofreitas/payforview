<?php 
		session_start();
		
		if (isset($_SESSION['error_genero'])) {
			echo "<script>
			$.notify({
				title: '<strong>Ops!</strong>',
				message: 'Erro ao inserir gênero: ".$_SESSION['error_genero']."'
			},{
				type: 'danger'
			});
			</script>";
			session_destroy();
		}
		if (isset($_SESSION['success_genero'])) {
			echo "<script>
			$.notify({
				title: '<strong>Sucesso!</strong>',
				message: 'Inserido novo gênero: ".$_SESSION['success_genero']."'
			},{
				type: 'success'
			});
			</script>";
			session_destroy();
		}
		if (isset($_SESSION['error_produtora'])) {
			echo "<script>
			$.notify({
				title: '<strong>Ops!</strong>',
				message: 'Erro ao inserir produtora: ".$_SESSION['error_genero']."'
			},{
				type: 'danger'
			});
			</script>";
			session_destroy();
		}
		if (isset($_SESSION['success_produtora'])) {
			echo "<script>
			$.notify({
				title: '<strong>Sucesso!</strong>',
				message: 'Inserido nova produtora: ".$_SESSION['success_produtora']."'
			},{
				type: 'success'
			});
			</script>";
			session_destroy();
		}
		if (isset($_SESSION['error_filme'])) {
			echo "<script>
			$.notify({
				title: '<strong>Ops!</strong>',
				message: 'Erro ao inserir filme: ".$_SESSION['error_filme']."'
			},{
				type: 'danger'
			});
			</script>";
			session_destroy();
		}
		if (isset($_SESSION['success_filme'])) {
			echo "<script>
			$.notify({
				title: '<strong>Sucesso!</strong>',
				message: 'Inserido novo filme: ".$_SESSION['success_filme']."'
			},{
				type: 'success'
			});
			</script>";
			session_destroy();
		}
	 ?>