function selectPlanos(){
	$.ajax({
		type: "POST", 
		url: "connection/selectPlanos.php",
		timeout: 3000,
		data: {},
		beforeSend: function() {
		/*$.notify({
			title: "<strong> </strong><br>",
			message: ""
		});*/
	},
	error: function() {
		$.notify({
			title: "<strong>Erro 404</strong><br>",
			message: "Servidor não encontrado!"
		},{
			type: '',
		});
	},
	success: function(retorno) {
		var planos = JSON.parse(retorno);
		$('.planos').html('');
		for (var i = 0; i < planos.length; i++) {
			$('.planos').append('<div class="pretty p-icon p-round p-rotate p-jelly"><input class="icheck" autocomplete="off" type="radio" name="plano" value="'
				+ planos[i].id_plano+
				'"/><div class="state p-danger"><i class="icon fas fa-ticket-alt fa-fw"></i><label>' 
				+ planos[i].nome_plano + 
				'</label></div></div>');
		}
	} 
});
}
function selectGeneros(){
	$.ajax({
		type: "POST", 
		url: "connection/selectGeneros.php",
		timeout: 3000,
		data: {},
		beforeSend: function() {
		/*$.notify({
			title: "<strong> </strong><br>",
			message: ""
		});*/
	},
	error: function() {
		$.notify({
			title: "<strong>Erro 404</strong><br>",
			message: "Servidor não encontrado!"
		},{
			type: '',
		});
	},
	success: function(retorno) {
		var generos = JSON.parse(retorno);
		$('.generos').html('');
		for (var i = 0; i < generos.length; i++) {
			$('.generos').append('<div class="pretty p-icon p-curve p-tada"><input class="icheck" autocomplete="off" type="checkbox" name="genero" value="'
				+ generos[i].id_genero+
				'"/><div class="state p-danger-o"><i class="icon fas fa-check fa-fw"></i><label>' 
				+ generos[i].nome_genero + 
				'</label></div></div>');
		}
	} 
});
}
function insertGeneroUser(num){
	try{
		var generos = $('[name=genero]:checked');
		for (var i = 0; generos.length > i ; i++) {
			var atual = generos[i].value;
			$.ajax({
				type: "POST", 
				url: "connection/insertGeneroUser.php",
				timeout: 3000,
				data: {genero: atual, user: num},
				error: function(){
					return false;
				}
			});
		}
		return true;
	}catch(e){
		logMyErrors(e);
		return false;
	}
}
$('#button').click(function(){
	login();
});
var mostrar = 0;
function show() {
	if (mostrar == 0) {
		$("#pass").attr("type", "text");
		$("#eye").addClass('fa-eye-slash');
		$("#eye").removeClass('fa-eye');
		mostrar = 1;
	}else{
		$("#pass").attr("type", "password");
		$("#eye").addClass('fa-eye');
		$("#eye").removeClass('fa-eye-slash');
		mostrar = 0;
	}
}
$('#cadastro').on('show.bs.modal', function() {
	selectPlanos();
	selectGeneros();
});
$(document).keypress(function(e){
	if(e.wich == 13 || e.keyCode == 13){
		login();
	}
})