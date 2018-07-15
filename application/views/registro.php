<div class="container mainRegistro">
	<div class="row">
		<div class="col-md-6">
			<div class="titleRegistro">
				<h1><i class="fas fa-user"></i> Crear mi cuenta gratis</h1>
				<h4>Ingresa tus datos para registrarte</h4>
			</div>
		</div>
		<div class="col-md-6"></div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<!--[FORMULARIO REGISTRO]-->
			<div id="myForm">
				<form>
				  <!--[NOMBRE COMPLETO]-->
				  <div class="form-group">
				    <label>Nombre Completo</label>
				    <input type="text" id="nombreCompleto" class="form-control" placeholder="Ingresar tu nombre">
				  </div>
				  <!--[/NOMBRE COMPLETO]-->

				  <!--[SEXO]-->
				  <div class="form-group">
					  <label>Sexo</label><br>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" checked type="radio" name="sexo" id="inlineRadio1" value="masculino">
						  <label class="form-check-label" for="inlineRadio1">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="femenino">
						  <label class="form-check-label" for="inlineRadio2">Femenino</label>
						</div>
					</div>
				  <!--[/SEXO]-->

				  <!--[REGION]-->
				  <div class="form-group">
				  	  <label for="inputState">Región</label>
				      <select id="selectRegion" name="region" class="form-control">
				      	<option selected>Seleccione Región</option>
				      	<? foreach($regions as $key => $val): ?>
				        	<option value="<?= $val->region_id ?>"><?= $val->region_name ."<br>" ?></option>
				    	<? endforeach ?>
				      </select>
				  </div>
				  <!--[/REGION]-->

				  <!--[COMUNA]-->
				  <div class="form-group">
				  	  <label for="inputState">Comuna</label>
				      <select id="inputState" name="town" class="form-control">
				      	<option selected>Seleccione Comuna</option>
				      </select>
				  </div>
				  <!--[/COMUNA]-->

				  <!--[TELEFONO]-->
				  <div class="form-group">
				  	<div class="row">
				  		<div class="col-md-3">
				  			<label for="inputState">Teléfono</label>
				  		</div>
				  		<div class="col-md-9">
				  			 <!--[TIPO TELEFONO]-->
							  <div class="form-group">
									<div class="form-check form-check-inline">
									  <input class="form-check-input" checked type="radio" name="typePhone" value="movil">
									  <label class="form-check-label">Móvil</label>
									</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="typePhone" value="fijo">
									  <label class="form-check-label">Fijo</label>
									</div>
								</div>
							  <!--[/TIPO TELEFONO]-->
				  		</div>
				  	</div>
				  </div>
				  <!--[/TELEFONO]-->
				  <!--[TYPE PHONE]-->
				  <div id="typePhone">
				  	<!--[MOVIL]-->
				  	<div class="form-group row">
				    	<label class="col-xs-2 col-sm-2 col-form-label" style="text-align: right">+569</label>
				    <div class="col-xs-8 col-sm-9">
				      <input type="email" class="form-control" placeholder="Ej: 59271861">
				    </div>
				  </div>
				  	<!--[/MOVIL]-->
				  </div>
				  <!--[/TYPE PHONE]-->

				  <button type="submit" id="btnRegister" class="btn btn-primary">Registrar</button>
				</form>
			</div>
			<!--[/FORMULARIO REGISTRO]-->
		</div>
		<div class="col-md-5">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti aperiam numquam corporis dolores unde! Voluptatum ab maxime error ipsum sunt dolor esse eos, perferendis corporis! Non, culpa est ullam provident.
		</div>
	</div>
</div>