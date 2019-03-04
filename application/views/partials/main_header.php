<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Yapues - Compra y Vende Artilugios</title>
	<meta name="keywords" content="Cyrax,System,Ainol,Code">
  	<meta name="author" content="Ignacio Ainol">
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap-multiselect.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
</head>
<body>
<div class="container-fluid" id="mainContainer">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="<?= base_url() ?>"><h1 id="mainTitle">Ya Pues!</h1></a>
			</div>
			<div class="col-md-6 logInLogOut">
				<? if ($this->session->userdata('logged_in')): ?>
					<a href="<?= base_url() ?>dashboard">Hola <?= $name ?>!</a>
					<a href="#"><i class="fas fa-envelope fa-lg"></i></a>
					<a href="#" data-toggle="modal" data-target="#cerrar_sesion"><i class="fas fa-power-off fa-lg"></i> Cerrar Sesión</a>
				<? else: ?>
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#inicio_sesion">Iniciar Sesion <i class="fas fa-user"></i></button>
				<? endif ?>
				<a href="<?= base_url() ?>form"><button class="btn btn-outline-info">Publica tu Aviso</button></a>
			</div>
		</div>
	</div>
</div>