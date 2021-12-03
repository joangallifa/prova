<?php
	$bd='';
    error_reporting(E_ALL);
	// require './includes/connexio.sql.php';
	require './includes/connexio.php';
	require './includes/Slim/Slim.php';

	header('Content-Type: application/json; charset=utf-8');

	/*****     API PUBLICA      *****/

	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();

	/*****     LANDING      *****/
	$app->get('/donaLlistesUsuari/:login',function($login) use($conn){
	    include('./includes/get.donaLlistesUsuari.php');
	});	
	

	$app->run();
