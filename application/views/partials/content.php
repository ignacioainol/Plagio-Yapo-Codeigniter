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
			  
			  <button type="submit" class="btn btn-primary">Buscar</button>
			</form>
		</div>

		<div class="col-md-9">
			<? foreach($posts as $key => $post): ?>
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		        <div class="col p-4 d-flex flex-column position-static">
		          <strong class="d-inline-block mb-1 text-primary"><?= $post->category_name ?></strong>
		          <h3 class="mb-0"><?= $post->post_title ?></h3>
		          <div class="mb-1 text-muted"><?= $post->fecha ?></div>
		          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
		          <!-- <a href="#" class="stretched-link">Continue reading</a> -->
		        </div>
		        <div class="col-auto d-none d-lg-block">
		          <img style="width: 200px; height: 200px" class="img-fluid" src="<?= base_url() ?>public/img/post_images/<?= $post->image_name ?>" alt="">
		        </div>
		      </div>
			<? endforeach ?>
		</div>
	</div>
</div>