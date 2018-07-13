$('#selectRegion').on('change',function(){
	$.getJSON('http://localhost/yapues/crearcuenta/gettowns/'+ this.value,function(data){
		$.each(data,function(key,value){
			console.log(value.town_name);
			$('#inputState').append('<option>'+value.town_name+'</option>');
		});
	});
	$('#inputState').empty();
	$('#inputState').append('<option>Seleccione Comuna</option>');
});