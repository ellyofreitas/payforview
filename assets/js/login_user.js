function validarEmail() {
	var id = form.email;
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
		$('#email').addClass('is-valid');
		$('#email').removeClass('is-invalid');
		return true;
	}else
	{
		$('#email').addClass('is-invalid');
		$('#email').removeClass('is-valid');
		return false;
	}
}
function validarSenha()
{
	if ($("#pass").val().length >= 8) 
	{
		$('#pass').addClass('is-valid');
		$('#pass').removeClass('is-invalid');
		return true;
	}else
	{
		$('#pass').addClass('is-invalid');
		$('#pass').removeClass('is-valid');
		return false;
	}
}
function login() 
{
	var url = 'connection/login_user.php';
	var senha_user = $('#pass').val();
	var email_user = $('#email').val();
	var val_email = validarEmail(), val_senha = validarSenha();
	if (val_email == true && val_senha == true) 
	{

		$.ajax({
			type: "POST", 
			url: "connection/login_user.php",
			timeout: 3000,
			data: {email: email_user, senha: senha_user},
			beforeSend: function() {
				$.notify({
					title: "<strong>Login</strong><br>",
					message: "Autenticando..."
				});
			},
			error: function() {
				$.notify({
					title: "<strong>Login</strong><br>",
					message: "Erro de conexão com servidor!"
				},{
					type: 'danger',
				});
			},
			success: function(retorno) {
				var aut = JSON.parse(retorno);
				if (aut.val == 0) {
					setTimeout(function(){
						$.notify({
							title: "<strong>Login</strong><br>",
							message: "Email ou senha incorretos!"
						},{
							type: 'danger',
						});
						$('#email').val('');
						validarEmail();
						$('#pass').val('');
						validarSenha();
					}, 3000);
				}else if(aut.val == 1){
					setTimeout(function (){
						$.notify({
							title: "<strong>Login</strong><br>",
							message: "Seja bem vindo !"
						},{
							type: 'success',
						});
						setTimeout('window.location="'+aut.url+'"', 4000);
					}, 3000);
				}else{
					alert(aut.val);
				}
			} 
		}); 
	}else
	{
		$.notify({
			title: "<strong>E-mail ou senha incorretos!</strong><br>",
			message: "Por favor, verifique seus dados"
		}, {
			type: 'danger'
		});
	}
}