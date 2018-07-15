$('document').ready(function(){
	$('#selectRegion').on('change',function(){
		$.getJSON('http://localhost/yapues/crearcuenta/gettowns/'+ this.value,function(data){
			$.each(data,function(key,value){
				$('#inputState').append('<option>'+value.town_name+'</option>');
			});
		});
		$('#inputState').empty();
		$('#inputState').append('<option>Seleccione Comuna</option>');
	});

	// Type of Phone
	$('input[type=radio][name=typePhone]').on('change',function(){
		if(this.value == 'movil'){
			$('#typePhone').html('<!--[MOVIL]--><div class="form-group row"><label class="col-sm-2 col-form-label" style="text-align: right">+569</label><div class="col-sm-9"><input type="text" class="form-control" placeholder="Ej: 59271861"></div></div><!--[/MOVIL]-->');
		}else if(this.value == 'fijo'){
			$('#typePhone').html('<!--[FIJO]--><div class="form-group row"><div class="col-sm-2" style="padding-right:0"><input type="text" class="form-control" placeholder="Codigo"></div><div class="col-sm-9"><input type="email" class="form-control" placeholder="Ej: 23536784"></div></div><!--[/FIJO]-->');
		}
	});
});
