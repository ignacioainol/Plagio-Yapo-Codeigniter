<?php

$config = array(
	'registro/register' => array(		
		array(
			'field' => 'fullname',
			'label' => 'Nombre',
			'rules' => 'trim|required|min_length[6]|max_length[100]'
		),
		array(
			'field' => 'sexo',
			'label' => 'Sexo',
			'rules' => 'required'
		),
		array(
			'field' => 'selectRegion',
			'label' => '...',
			'rules' => 'required|callback_check_select'
		),
		array(
			'field' => 'selectTown',
			'label' => '...',
			'rules' => 'required|callback_check_town'
		),
		array(
			'field' => 'numberPhone',
			'label' => 'Número telefónico',
			'rules' => 'required|min_length[7]|max_length[8]'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'trim|required|valid_email|is_unique[users.email]'
		),
		array(
			'field' => 'password',
			'label' => 'contraseña',
			'rules' => 'trim|required|min_length[6]'
		),
		array(
			'field' => 'passwordRepeat',
			'label' => 'de confirmación contraseña',
			'rules' => 'trim|matches[password]'
		),
		array(
			'field' => 'accept_terms',
			'label' => '...',
			'rules' => 'callback_accept_terms'
		)
	),
	'login/index' => array(
		array(
			'field' => 'emailLogin',
			'label' => 'E-mail',
			'rules' => 'required|callback_validate_email'
		),
		array(
			'field' => 'passwordLogin',
			'label' => 'Password',
			'rules' => 'required'
		)
	)
);