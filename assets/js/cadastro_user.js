function validarEmailCad() {
	var id = document.getElementById('email_cad');
	usuario = id.value.substring(0, id.value.indexOf("@"));
	dominio = id.value.substring(id.value.indexOf("@")+ 1, id.value.length);

	if ((usuario.length >=1) &&
		(dominio.length >=3) && 
		(usuario.search("@")==-1) && 
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) && 
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&      
		(dominio.indexOf(".") >=1)&& 
		(dominio.lastIndexOf(".") < dominio.length - 1)) 
	{	
		$('#email_cad').addClass('is-valid');
		$('#email_cad').removeClass('is-invalid');
		return true;
	}else
	{	
		$('#invalid_cad_email').html('Por favor insira um e-mail válido!');
		$('#email_cad').addClass('is-invalid');
		$('#email_cad').removeClass('is-valid');
		return false;
	}
}
function validarSenhaCad()
{
	if ($("#pass_cad").val().length >= 8) 
	{
		$('#pass_cad').addClass('is-valid');
		$('#pass_cad').removeClass('is-invalid');
		$('#pass_confirm').removeClass('is-invalid');
		$('#invalid_cad_senha').html('');
		return true;
	}else
	{	
		$('#invalid_cad_senha').html('Por favor insira uma senha válida a partir de 8 caracteres!');
		$('#pass_cad').addClass('is-invalid');
		$('#pass_cad').removeClass('is-valid');
		$('#pass_confirm').val('');
		$('#pass_confirm').addClass('is-invalid');
		$('#pass_confirm').removeClass('is-valid');
		return false;
	}
}
function confirmarSenha(){
	if (validarSenhaCad() == true) {
		if ($('#pass_cad').val() == $('#pass_confirm').val()) {
			$('#pass_cad').addClass('is-valid');
			$('#pass_cad').removeClass('is-invalid');
			$('#pass_confirm').addClass('is-valid');
			$('#pass_confirm').removeClass('is-invalid');
			return true;
		}else{
			$('#invalid_cad_senha').html('Por favor verifique se as duas senhas estão iguais!');
			$('#pass_cad').addClass('is-invalid');
			$('#pass_cad').removeClass('is-valid');
			$('#pass_confirm').addClass('is-invalid');
			$('#pass_confirm').removeClass('is-valid');
			return false;
		}
		return false;
	}else{
		//validarSenhaCad();
		return false;
	}
	
}
function cadastroUser(){
	var nome = $('#nome').val();
	var sobrenome = $('#sobrenome').val();
	var email = $('#email_cad').val();
	var senha = $('#pass_cad').val();
	var plano = $('[name=plano]:checked').val();

	if (validarSenhaCad() == true && confirmarSenha() == true && validarEmailCad() == true) {
		$.ajax({
			type: "POST", 
			url: "connection/cadastroUser.php",
			timeout: 3000,
			data: {nome: nome,sobrenome: sobrenome, email: email, senha: senha, plano: plano},
			beforeSend: function() {

			},
			error: function() {
				$.notify({
					title: "<strong></strong><br>",
					message: ""
				},{
					type: '',
				});
			},
			success: function(retorno) {
				var result = JSON.parse(retorno);
				if (result['stts'] == 1) {
					var num = result['num'];
					if(insertGeneroUser(num) == true){
						$('#alert').html('<div class="alert alert-success alert-dismissible fade show col" role="alert"><strong> Cadastro Feito com Sucesso!</br></strong> Já pode acessar nosso conteúdo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						var email_v = $('#email_cad').val();
						var senha_v = $('#pass_cad').val();
						$('#email').val(email_v);
						$('#pass').val(senha_v);
					}
				}else if(result['stts'] == 2){
					$('#email_cad').addClass('is-invalid');
					$('#email_cad').removeClass('is-valid');
					$('#invalid_cad_email').html(result['msg']);
					$('#alert').html('<div class="alert alert-warning alert-dismissible fade show col" role="alert"><strong>Erro ao cadastrar</br></strong>'+result['msg']+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}else{
					$('#alert').html('<div class="alert alert-warning alert-dismissible fade show col" role="alert"><strong>Erro ao cadastrar</br></strong>'+result['msg']+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
			} 
		});
	}else{
		$('#alert').html('<div class="alert alert-warning alert-dismissible fade show col" role="alert"><strong>Dados Errados!</br></strong> Por favor verifique seus dados.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
}