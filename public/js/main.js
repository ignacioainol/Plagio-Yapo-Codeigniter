$('document').ready(function(){
	$('#selectRegion').on('change',function(){
		$.getJSON('http://localhost/yapues/registro/gettowns/'+ this.value,function(data){
			$.each(data,function(key,value){
				$('#selectTown').append('<option>'+value.town_name+'</option>');
			});
		});
		$('#selectTown').empty();
		$('#selectTown').append('<option>Seleccione Comuna</option>');
	});

	// Type of Phone
	$('input[type=radio][name=typePhone]').on('change',function(){
		if(this.value == 'movil'){
			$('#typePhone').html('<!--[MOVIL]--><div class="form-row" style="margin-bottom: 8px"><div class="col-sm-12"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text">+569</div></div><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" placeholder="Ej: 59271861"></div></div></div><!--[/MOVIL]-->');
		}else if(this.value == 'fijo'){
			$('#typePhone').html('<!--[FIJO]--><div class="form-group row"><div class="col-sm-2" style="padding-right:0"><input type="text" class="form-control" placeholder="Codigo"></div><div class="col-sm-10"><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" placeholder="Ej: 23536784"></div></div><!--[/FIJO]-->');
		}
	});

});

function textonly(e){
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = String.fromCharCode(code);
    var AllowRegex  = /^[\ba-zA-Z\s-]$/;
    if (AllowRegex.test(character)) return true;     
    return false; 
}

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};

function validateEmail(mail) {
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value)){
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}