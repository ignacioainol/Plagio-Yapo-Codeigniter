<dic class="container mainWrapperForm">
	<div class="container">
		<form action="<?= base_url() ?>form/newpost" id="newpost" method="post">
			<div class="row">
				<div class="col-xl-6 col-md-12 col-lg-12">
					<h4>Publica tu aviso!</h4>
					<p>Tu aviso será revisado por nuestro equipo y será publicado si cumple con las reglas de Yapues.cl</p>
					<div class="form-group">
						<label>Categoría</label>
					    <select class="form-control" id="selectCategory" name="selectCategory">
					    	<option value="xxx"> [[ Seleccione una categoría ]] </option>
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
					    <input type="text" name="titlePost" id="titlePost" class="form-control" placeholder="Ingresar Título">
					  </div>
					  <div class="form-group">
					    <label>Descripción</label>
					    <textarea name="descriptionPost" id="descriptionPost" class="form-control" cols="30" rows="3"></textarea>
					  </div>
					  <div class="form-group">
					    <label>Precio $</label>
					    <input type="text" name="pricePost" id="pricePost" onkeypress="return validateNumber(event)" class="form-control">
					  </div>
					  <div class="form-group">
						
					  </div>

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
				
				  <!--[USER]-->
					<h5><i class="far fa-user"></i> Tu información</h5>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nombre *</label>
					    		<input name="nameUserPost" id="nameUserPost" type="text" class="form-control" placeholder="Ingresa tu Nombre">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>E-mail *</label>
					    		<input name="emailUserPost" id="emailUserPost" type="email" class="form-control" placeholder="Ingresa tu correo electrónico">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Confirmar e-mail *</label>
					    		<input type="email" name="emailUserConfirmPost" id="emailUserConfirmPost" class="form-control" placeholder="Confirmar E-mail">
							</div>
						</div>
						<!--[TELEPHONE HERE]-->
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" checked type="radio" name="typePhonePost" value="movil">
								  <label class="form-check-label">Móvil</label>
								</div>
								<div class="form-check form-check-inline">
								  <input required class="form-check-input" type="radio" name="typePhonePost" value="fijo">
								  <label class="form-check-label">Fijo</label>
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
							  <!--[/TYPE PHONE]-->
						</div>

						<!--[TELEPHONE HERE]-->

					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Contraseña *</label>
					    		<input type="password" name="passwordUserPost" id="passwordUserPost" class="form-control" placeholder="*********">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Confirmar Contraseña</label>
					    		<input type="password" name="passwordUserConfirmPost" id="passwordUserConfirmPost" class="form-control" placeholder="*********">
							</div>
						</div>
					</div>

				  <!--[/USER]-->

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
			  	<button type="submit" id="btnRegister" class="btn btn-success">Publicar</button><br>
			  	<img src="<?= base_url() ?>public/img/cuboload.svg" id="gifload" alt="loading" style="display: none;">
			  </div>
			</div>
		</div>
		</form>
	</div>
</dic>