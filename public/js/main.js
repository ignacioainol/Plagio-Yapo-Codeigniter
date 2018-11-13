
const app = new Vue({
 
  el: '#mainRegistro',
  data: {
  	formSee: true
  }
  // methods:{
  //       deleteForm:function(){
		  
  //   }
  // }
});


$('document').ready(function(){
	$('#selectRegion').on('change',function(){
		$.getJSON('http://localhost/yapues/registro/gettowns/'+ this.value,function(data){
			$.each(data,function(key,value){
				$('#selectTown').append('<option value='+value.town_id+'>'+value.town_name+'</option>');
			});
		});
		$('#selectTown').empty();
		$('#selectTown').append('<option selected="selected" value="xxx">Seleccione Comuna</option>');
	});	

	$('input[type=radio][name=typePhone]').on('change',function(){
		if(this.value == 'movil'){
			$('#typePhone').html('<!--[MOVIL]--><div class="form-row" style="margin-bottom: 8px"><div class="col-sm-12"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text">+569</div></div><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" name="numberPhone" placeholder="Ej: 59271861"></div></div></div><!--[/MOVIL]-->');
		}else if(this.value == 'fijo'){
			$('#typePhone').html('<!--[FIJO]--><div class="form-group row"><div class="col-sm-2" style="padding-right:0"><input type="text" class="form-control" placeholder="Codigo"></div><div class="col-sm-10"><input type="text" required onkeypress="return validateNumber(event)" class="form-control numberPhone" name="numberPhone" placeholder="Ej: 23536784"></div></div><!--[/FIJO]-->');
		}
	});



	$('#registerForm').unbind('submit').bind('submit',function(){
		$('#acceptTerminos').on('click',function(){
			$('#accept_terms')[0].checked = true;
		});

		var form = $(this);

		if($('#accept_terms').is(':checked')){
			$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			beforeSend:function(){
				document.getElementById('btnRegister').style.display = 'none';
				document.getElementById('gifload').style.display = 'inline';
			},
			success: function(response){
				console.log(response);
				document.getElementById('gifload').style.display = 'none';
				if(response.success == true){
					$('#messages').html('<div class="alert alert-success" role="alert">'+
  											'<strong>Registro ok!</strong> Verifica tu cuenta. Te hemos enviado un email de activación al correo indicado.'+
										'</div>');

					$('#registerForm')[0].reset();
					$('.alert-warning').remove();
					$('.form-group').removeClass('alert-warning').removeClass('has-success');

					app.formSee = false
				}else{
					document.getElementById('btnRegister').style.display = 'inline';
					document.getElementById('gifload').style.display = 'none';
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
		}else{
			$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.success == true){
					$('#messages').html('<div class="alert alert-success" role="alert">'+
  											'<strong>Registro ok!</strong> Registro ok :D'+
										'</div>');

					$('#registerForm')[0].reset();
					$('.alert-warning').remove();
					$('.form-group').removeClass('alert-warning').removeClass('has-success');

					var app = new Vue({
						el: '#mainRegistro',
						data:{
							formSee: false
						}
					});
				}else{

					$.each(response.messages,function(index,value){
						var element = $('#'+index);
						console.log(index);

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
			$('#exampleModal').modal('show');
			return false;
		}

		
	});

	$('#loginForm').unbind('submit').bind('submit',function(){
		var form = $(this);

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success: function(response){
				if(response.success == true){
					$('.alert-warning').remove();
					$('.form-group').removeClass('alert-warning').removeClass('has-success');
					window.location.href = response.messages;
				}else{

					if(response.messages instanceof Object){
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
						
					}else{
						console.log(response.messages);
						$('.alert-warning').remove();
						$('.form-group').removeClass('alert-warning').removeClass('has-success');
						
						$('#messagesLogin').html("<div class='alert alert-warning' role='alert'>" +
  							response.messages +
						"</div>");
						

					}

				}
			}

		})

		 return false;
	});

	$('#logout').unbind('submit').bind('submit',function(){
		var form = $(this);
		
		$.ajax({ 
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success: function(response){
				if(response.success == true){
					window.location.href = response.messages;
				}
			}
		});
	});

	return false;

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