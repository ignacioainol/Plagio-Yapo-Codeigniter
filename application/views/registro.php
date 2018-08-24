<div class="container mainRegistro" id="mainRegistro">
	<div class="row">
		<div class="col-md-6">
			<div class="titleRegistro">
				<h1><i class="fas fa-user"></i> Crear mi cuenta gratis</h1>
				<h4>Ingresa tus datos para registrarte</h4>
			</div>
		</div>
		<div class="col-md-6"></div>
	</div>
	
	<!--[FORMULARIO REGISTRO]-->
	<div id="messages"></div>
	<form action="<?= base_url() ?>registro/register" id="registerForm" method="post" v-if="formSee">
		<div class="row">
			<div class="col-md-6 registerStepOne">
				<!--[NOMBRE COMPLETO]-->
				  <div class="form-group fullnameDiv">
				    <label>Nombre Completo *</label>
				    <input type="text" name="fullname" value="<?= set_value('fullname') ?>" onkeypress="return textonly(event)" class="form-control" id="fullname" placeholder="Ingresar tu nombre">
				  </div>
				  <!--[/NOMBRE COMPLETO]-->

				  <!--[SEXO]-->
				  <div class="form-group">
					  <label>Sexo</label><br>
						<div class="form-check form-check-inline">
						  <input class="form-check-input selectSex" checked type="radio" name="sexo" value="masculino">
						  <label class="form-check-label">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input selectSex" type="radio" name="sexo" value="femenino">
						  <label class="form-check-label">Femenino</label>
						</div>
					</div>
				  <!--[/SEXO]-->

				  <!--[REGION]-->
				  <div class="form-group regionDiv">
				  	  <label>Región *</label>
				      <select id="selectRegion" name="selectRegion" class="form-control">
				      	<option selected="selected" value="xxx">Seleccione Región</option>
				      	<? foreach($regions as $key => $val): ?>
				        	<option value="<?= $val->region_id ?>"><?= $val->region_name ."<br>" ?></option>
				    	<? endforeach ?>
				      </select>
				  </div>
				  <!--[/REGION]-->

				  <!--[COMUNA]-->
				  <div class="form-group">
				  	  <label>Comuna</label>
				      <select id="selectTown" name="town" class="form-control">
				      	<option selected>Seleccione Comuna</option>
				      </select>
				  </div>
				  <!--[/COMUNA]-->
			</div>
			<div class="col-md-6 registerStepTwo">
				<!--[TELEFONO]-->
			  <div class="form-group telefono" style="margin-bottom: 0">
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="inputState">Teléfono *</label>
			  		</div>
			  		<div class="col-md-9">
			  			 <!--[TIPO TELEFONO]-->
						  <div class="form-group">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" checked type="radio" name="typePhone" value="movil">
								  <label class="form-check-label">Móvil</label>
								</div>
								<div class="form-check form-check-inline">
								  <input required class="form-check-input" type="radio" name="typePhone" value="fijo">
								  <label class="form-check-label">Fijo</label>
								</div>
							</div>
						  <!--[/TIPO TELEFONO]-->
			  		</div>
			  	</div>
			  </div>

			  <!--[TYPE PHONE]-->
			  <div id="typePhone">
			  	<!--[MOVIL]-->
				<div class="form-row" style="margin-bottom: 8px">
				    <div class="col-sm-12">
				    	<div class="form-group">
				    		<div id="numberPhone">
					    		<div class="input-group mb-2 noMarginBottom">
							        <div class="input-group-prepend">
							          <div class="input-group-text">+569</div>
							        </div>
							        <input type="text" onkeypress="return validateNumber(event)" class="form-control numberPhone" name="numberPhone" value="<?= set_value('numberPhone') ?>" placeholder="Ej: 59271861">
						      	</div>
					    	</div>
				    	</div>
				    </div>
				  </div>
				<!--[/MOVIL]-->
			  </div>
			  <!--[/TELEFONO]-->

			  <!--[/TYPE PHONE]-->

			  <!--[EMAIL]-->
			  <div class="form-group">
			    <label>E-mail *</label>
			    <input type="email" class="form-control" placeholder="Ingresar tu correo electrónico" name="email" id="email" value="<?= set_value('email') ?>">
			  </div>
			  <!--[/EMAIL]-->

			  <!--[CONTRASENA]-->
			  <div class="form-group">
			    <label>Contraseña *</label>
			    <input type="password" id="password" name="password" class="form-control" placeholder="********">
			  </div>
			  <!--[/CONTRASENA]-->

			  <!--[REPETIR CONTRASENA]-->
			  <div class="form-group">
			    <label>Confirmar Contraseña *</label>
			    <input type="password" id="passwordRepeat" name="passwordRepeat" class="form-control" placeholder="********">
			  </div>
			  <!--[/REPETIR CONTRASENA]-->
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			  <!--[TERMINOS Y CONDICIONES]-->
			  <div class="form-group" style="text-align: center">

			  	<input class="form-check-input" type="checkbox" id="accept_terms" name="accept_terms" checked="checked" value="yes" />

			    <label class="form-check-label">Estoy de acuerdo con los <a href="#" data-toggle="modal" data-target="#terminosCondiciones">Términos y Condiciones</a></label>
			  </div>
			  <!--[/TERMINOS Y CONDICIONES]-->
			
			  <div class="text-center">
			  	<button type="submit" id="btnRegister" class="btn btn-primary">Registrar</button>
			  </div>
			</div>
		</div>
	</form>
	<!--[/FORMULARIO REGISTRO]-->
</div>

<!--[MODAL TERMINOS]-->
<div class="modal fade" id="terminosCondiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--[MODAL TERMINOS]-->

<!--[MODAL ACEPTAR TERMINOS]-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Debes Aceptar los Términos y Condiciones</h5>
        <div style="text-align: center">
        	<button type="button" id="acceptTerminos" class="btn btn-info" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--[/MODAL ACEPTAR TERMINOS]-->