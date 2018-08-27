<div class="container-fluid" id="mainContainer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="<?= base_url() ?>"><h1 id="mainTitle">Ya Pues!</h1></a>
				<img src="<?= base_url() ?>public/img/pad.png" alt="">
			</div>
			<div class="col-md-6">
				<button class="btn btn-outline-info">Publica tu Aviso</button>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#inicio_sesion">Iniciar Sesion <i class="fas fa-user"></i></button>
				<!--[REGIONES]-->
				<table class="table">
				  <tbody>
				  	<? foreach($regions as $key => $val): ?>
				    <tr>
				      <td><?= $val->region_name ."<br>" ?></td>
				    </tr>
				    <? endforeach ?>
				  </tbody>
				</table>
				<!--[/REGIONES]-->
			</div>
		</div>
	</div>
</div>