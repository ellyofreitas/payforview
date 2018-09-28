$.ajax({
	type: "POST", 
	url: "",
	timeout: 3000,
	data: {},
	beforeSend: function() {
		$.notify({
			title: "<strong> </strong><br>",
			message: ""
		});
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
		var aut = JSON.parse(retorno);
		if(retorno){
			$.notify({
				title: "<strong></strong><br>",
				message: ""
			},{
				type: '',
			});
		}else{
			$.notify({
				title: "<strong></strong><br>",
				message: ""
			},{
				type: '',
			});
		}
	} 
});