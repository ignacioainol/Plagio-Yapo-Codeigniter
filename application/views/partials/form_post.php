<dic class="container mainWrapperForm">
	<div class="container">
		<form>
			<div class="col-xl-6 col-md-12 col-lg-12">
				<h4>Publica tu aviso!</h4>
				<p>Tu aviso será revisado por nuestro equipo y será publicado si cumple con las reglas de yapo.cl</p>
				<div class="form-group">
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
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
	</div>
</dic>