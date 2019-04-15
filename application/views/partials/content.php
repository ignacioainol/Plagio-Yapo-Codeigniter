<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<div class="container" style="margin-top: 2em">
	<input type="hidden" value="<?= $regionId ?>" id="regionId">
	<div class="row">
		<div class="col-md-3">
			<form action="<?= base_url() . $regionName ?>/avisos" method="get">
			  <div class="form-group">
			    <label><strong>Busca lo que necesites</strong></label>
			    <input type="text" class="form-control" id="thingToFind" name="q" placeholder="Busqueda ...">
			    <small class="form-text text-muted">Busque por palabras claves o texto completo</small>
			  </div>
			  <div class="form-group">
				<!--[CATEGORIAS]-->
			    <div class="form-group">
						<label>Categoría</label>
						<label> session de categoria <?= $this->session->userdata('categoryId') ?></label>
					    <select class="form-control" id="selectCategory" name="cat">
					    	<? if($this->session->userdata('categoryId')): ?>
					    		<option value="<?= $this->session->userdata('categoryId') ?>"> sesion ok </option>
					    	<? else: ?>
					    		<option value="xxx"> [[ Seleccione una categoría ]] </option>
					    	<? endif ?>
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
				<!--[/CATEGORIAS]-->

			  	<!--[REGIONES]-->
			    <label><strong>Filtro de Región</strong></label>
			    <select id="selectRegionSearch" name="reg" class="form-control">
		      	<option selected="selected" value="xxx">Seleccione Región</option>
		      	<? foreach($regions as $key => $val): ?>
		        	<option <? if($regionId == $val->region_id ){ echo "selected";} ?> value="<?= $val->region_id ?>"><?= $val->region_name ."<br>" ?></option>
		    	<? endforeach ?>
		       </select>
				<!--[/REGIONES]-->

				<!--[COMUNAS]-->
				<div class="mt-3">
					<label><strong>Filtro de Comunas</strong></label>

					<div class="form-check" id="selectTownSearch">
				  <!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
				    Default checkbox
				  </label> -->
				</div>
				</div>
				<!--[/COMUNAS]-->
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Buscar</button>
			</form>
		</div>

		<div class="col-md-9">
			<? foreach($posts as $key => $post): ?>
				<div class="row no-gutters thisPost border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		        <div class="col p-4 d-flex flex-column position-static">
		        	<div class="row">
		        		<div class="col-md-8">
		        			<strong class="d-inline-block mb-1 text-primary"><?= $post->category_name ?></strong>
		        			<div class="mb-1 mt-2 text-muted"><?= $post->fecha ?></div>
		        		</div>
		        		<div class="col-md-4">
		        			<span><strong><?= $post->region_name ?></strong></span>
		        			<p><?= $post->town_name ?></p>
		        		</div>
		        	</div>
					<h4 class="mb-0 mt-3"><?= $post->post_title ?></h4>
		        </div>
		        <div class="col-auto">
		          <img style="width: 200px; height: 200px" class="img-fluid" src="<?= base_url() ?>public/img/post_images/<?= $post->image_name ?>" alt="">
		        </div>
		      </div>
			<? endforeach ?>
		</div>
	</div>
</div>