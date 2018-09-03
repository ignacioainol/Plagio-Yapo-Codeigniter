<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verificacion de email</title>
</head>
<body>
	
</body>
</html>
<style>
	
</style>

<div class="contentEmail">
	<h2>Est&aacute;s a un paso de crear tu cuenta!</h2>
	<hr>
	<h1>Hola, <?= $name ?></h1> <span style="font-size: 1.5em"> Ya casi!!</span>
	<br>
	<h4>Acabas de crear tu cuenta en <a href="http://yapues.cl">yapues.cl</a>, para utilizarla debes activarla dando click en el sigte link.</h4>

	<a href="<?= base_url().'registro/confirm'  ?>"><?= base_url().'registro/confirm' ?></a>
</div>