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
				    <input type="text" class="form-control" placeholder="Ingresar tu nombre">
				  </div>
				  <!--[/NOMBRE COMPLETO]-->

				  <!--[SEXO]-->
				  <div class="form-group">
					  <label>Sexo</label><br>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
						  <label class="form-check-label" for="inlineRadio1">Masculino</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
						  <label class="form-check-label" for="inlineRadio2">Femenino</label>
						</div>
					</div>
				  <!--[/SEXO]-->

				  <!--[REGION]-->
				  <div class="form-group">
				  	  <label for="inputState">Región</label>
				      <select id="selectRegion" class="form-control">
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
				      <select id="inputState" class="form-control">
				      	<option selected>Seleccione Comuna</option>
				      </select>
				  </div>
				  <!--[/COMUNA]-->

				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<!--[/FORMULARIO REGISTRO]-->
		</div>
		<div class="col-md-5">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti aperiam numquam corporis dolores unde! Voluptatum ab maxime error ipsum sunt dolor esse eos, perferendis corporis! Non, culpa est ullam provident.
		</div>
	</div>
</div>