$('document').ready(function(){
	//Set region json :D
	$('#selectRegion').on('change',function(){
		$.getJSON('http://localhost/yapues/registro/gettowns/'+ this.value,function(data){
			$.each(data,function(key,value){
				$('#selectTown').append('<option value='+value.town_id+'>'+value.town_name+'</option>');
			});
		});
		$('#selectTown').empty();
		$('#selectTown').append('<option>Seleccione Comuna</option>');
	});

	// Type of Phone
	$('input[type=radio][name=typePhone]').on('change',function(){
		if(this.value == 'movil'){
			$('#typePhone').html('<!--[MOVIL]--><div class="form-row" style="margin-bottom: 8px"><div class="col-sm-12"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text">+569</div></div><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" name="numberPhone" placeholder="Ej: 59271861"></div></div></div><!--[/MOVIL]-->');
		}else if(this.value == 'fijo'){
			$('#typePhone').html('<!--[FIJO]--><div class="form-group row"><div class="col-sm-2" style="padding-right:0"><input type="text" class="form-control" placeholder="Codigo"></div><div class="col-sm-10"><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" name="numberPhone" placeholder="Ej: 23536784"></div></div><!--[/FIJO]-->');
		}
	});

	//Ajax form register :D
	$('#registerForm').unbind('submit').bind('submit',function(){
		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.success == true){
					$('#messages').html('<div class="alert alert-success" role="alert">'+
  											'<strong>Well done!</strong> Registro ok :D'+
										'</div>');

					$('#registerForm')[0].reset();
					$('.text-danger').remove();
					$('.form-group').removeClass('alert-warning').removeClass('has-success');
				}else{
					$.each(response.messages,function(index,value){
						var element = $('#'+index);

						$(element)
							.closest('.form-group')
							.removeClass('alert-warning')
							.removeClass('has-success')
							.addClass(value.length > 0 ? 'has-error':'has-success')
							.find('.alert-warning').remove();

						$(element).after(value);
					});
				}
			}
		});

		return false;
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