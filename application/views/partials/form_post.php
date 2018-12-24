<dic class="container mainWrapperForm">
	<div class="container">
		<form action="">
			<div class="row">
				<div class="col-xl-6 col-md-12 col-lg-12">
					<h4>Publica tu aviso!</h4>
					<p>Tu aviso será revisado por nuestro equipo y será publicado si cumple con las reglas de Yapues.cl</p>
					<div class="form-group">
						<label>Categoría</label>
					    <select class="form-control" id="exampleFormControlSelect1">
					    	<option value=""> [[ Seleccione una categoría ]] </option>
					    	<? foreach ($catParents as $key => $catParent): ?>
					    		<option disabled value="<?= $catParent->type_cat_id ?>">[[ <?= $catParent->type_cat_name ?> ]]</option>
					    		<? foreach($subCategories as $key => $subCat): ?>
					    			<? if($subCat->type_cat_id == $catParent->type_cat_id): ?>
					    			<option value="<?= $subCat->category_id ?>"> &nbsp;&nbsp;&nbsp;<?= $subCat->category_name ?></option>
					    			<? endif ?>
					    		<? endforeach ?>
					    	<? endforeach ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label>Título</label>
					    <input type="text" class="form-control" placeholder="Ingresar Título">
					  </div>
					  <div class="form-group">
					    <label>Descripción</label>
					    <textarea name="" id="" class="form-control" cols="30" rows="3"></textarea>
					  </div>
					  <div class="form-group">
					    <label>Precio $</label>
					    <input type="text" class="form-control">
					  </div>
					  <div class="form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1">
					    <label class="form-check-label" for="exampleCheck1">Estoy de acuerdo con los <a href="#">Términos y condiciones</a></label>
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<div class="col-xl-6 col-md-12 col-lg-12">
					<h5><i class="fas fa-map-marked-alt"></i> Ubicación de tu anuncio</h5>

					<!--[REGION]-->
					<div class="form-group">
						<label>Región *</label>
						<select id="selectRegion" name="selectRegion" class="form-control" required="required">
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
				      <select id="selectTown" name="selectTown" class="form-control">
				      	<option selected="selected" value="xxx">Seleccione Comuna</option>
				      </select>
				  </div>
				  <!--[/COMUNA]-->
				</div>
			</div>
		</form>
	</div>
</dic>