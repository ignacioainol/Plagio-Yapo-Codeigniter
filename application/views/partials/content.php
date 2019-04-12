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
			    <select id="selectRegionSearch" name="selectRegionSearch" class="form-control" required="required">
				      	<option selected="selected" value="xxx">Seleccione Región</option>
				      	<? foreach($regions as $key => $val): ?>
				        	<option value="<?= $val->region_id ?>"><?= $val->region_name ."<br>" ?></option>
				    	<? endforeach ?>
				      </select>
				<!--[/REGIONES]-->

				<!--[COMUNAS]-->
				<div class="form-check" id="selectTownSearch">
				  <!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
				    Default checkbox
				  </label> -->
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