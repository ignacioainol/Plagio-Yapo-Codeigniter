<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<div class="container" style="margin-top: 2em">
	<div class="row">
		<div class="col-md-3">
			<form>
			  <div class="form-group">
			    <label><strong>Busca lo que necesites</strong></label>
			    <input type="text" class="form-control" id="thingToFind" placeholder="Busqueda ...">
			    <small class="form-text text-muted">Busque por palabras claves o texto completo</small>
			  </div>
			  <div class="form-group">
			  	<!--[REGIONES]-->
			    <label for="exampleInputPassword1"><strong>Filtro de Región</strong></label>
			    <select id="selectRegion" name="selectRegion" class="form-control" required="required">
				      	<option selected="selected" value="xxx">Seleccione Región</option>
				      	<? foreach($regions as $key => $val): ?>
				        	<option value="<?= $val->region_id ?>"><?= $val->region_name ."<br>" ?></option>
				    	<? endforeach ?>
				      </select>
				<!--[/REGIONES]-->
			  </div>

			  <div class="form-group">
			  	<!--[COMUNAS]-->
			  	<select id="selectTown" name="selectTown" multiple="multiple" class="form-control">
		      		<option selected="selected" value="xxx">Seleccione Comuna</option>
		      	</select>
				<!--[/COMUNAS]-->
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

		<div class="col-md-9">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam est itaque dicta temporibus impedit voluptate consequatur laboriosam sequi, aspernatur dolorum laborum, molestias atque laudantium nobis asperiores deserunt. Vero esse, sequi!
		</div>
	</div>
</div>