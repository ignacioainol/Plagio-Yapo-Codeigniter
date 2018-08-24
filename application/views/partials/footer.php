	<!--[INICIO SESION]-->
	<div class="modal fade" id="inicio_sesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      	<h5 class="modal-title">Inicio de Sesión</h5>
	        <form>
			  <div class="form-group">
			    <input type="email" class="form-control" name="email" placeholder="Ingrese su correo">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" placeholder="Ingresa tu Contraseña">
			  </div>
			  <div class="btnLogin">
			  	<small><a href="">¿ Olvidaste tu contraseña ?</a></small>
			  	<button type="submit" class="btn btn-danger btnEnter">Entrar</button>
			  	<p>¿ No tienes cuenta ? <a href="<?= base_url() ?>registro">Crear cuenta</a></p>
			  </div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	<!--[/INICIO SESION]-->

	<script src="<?= base_url() ?>public/js/jquery.js"></script>
	<script src="<?= base_url() ?>public/js/vue.js"></script>
	<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>public/js/mainVue.js"></script>
	<script src="<?= base_url() ?>public/js/main.js"></script>
<!-- 	<script>
		document.getElementById('btnRegister').addEventListener('click',function(e){
			e.preventDefault();
			let agree = "";
			if($('#agree').not(':checked').length){
			   agree = "nochecked";
			}else{
			   agree = "checked";
			} 
			$.ajax({
				type: 'POST',
				url: '<?= base_url() . 'registro' ?>',
				data:{
					fullname: $('#fullname').val(),
					sexo: $('.selectSex:checked').val(),
					region: $('#selectRegion').val(),
					town: $('#selectTown').val(),
					number: $('.numberPhone').val(),
					email: $('#correoElectronico').val(),
					password: $('#password').val(),
					passwordRepeat: $('#passwordRepeat').val(),
					agree : agree
				},
				success: function(response){
					alert(response);
				}
			});
		});
	</script> -->

</body>
</html>