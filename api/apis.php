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

		// API GESTIO LOPD - RESPOSTES
	$app->get('/donaLlistesUsuari/:login',function($login) use($conn){
	    include('./includes/get.donaLlistesUsuari.php');
	});	

	$app->get('/donaInformacioLlista/:guidLlista',function($guidLlista) use($conn){
    	include('./includes/get.donaInformacioLlista.php');
   	});	

   	// $app->get('/donaDadesLlista/:sentencia',function($sentencia) use($conn){
    // 	include('./includes/get.donaDadesLlista.php');
   	// });	

   	$app->get('/donaValors/:guidLlista',function($guidLlista) use($conn){
    	include('./includes/get.donaValorsLlista.php');
   	});	

   	$app->get('/postDesaValors/:guidLlista',function($guidLlista) use($conn){
    	include('./includes/get.postDesaValors.php');
   	});	

   	$app->post('/desaValors',function() use($conn,$app){
	    include('./includes/set.desaValor.php');
	});



















	/*****     LANDING      *****/
	$app->get('/text/:centre',function($centre) use($conn){
	    include('./includes/get.text.php');
	});

	$app->get('/resultatsAlumne/:guidAluAlexia',function($guidAluAlexia) use($conn){
	    include('./includes/get.resultatsAlumne.php');
	});

	$app->get('/etapaCursSeccio/:guidAluAlexia',function($centre) use($conn){
	    include('./includes/get.etapaCursSeccio.php');
	});

	$app->get('/donaFamilia/:guidAluAlexia',function($guidAluAlexia) use($conn){
	    include('./includes/get.donaFamiliars.php');
	});

	// $app->get('/resultats/:guidAluOrigen',function($guidAluOrigen) use($conn){
	//     include('./includes/get.resultats.php');
	// });

	$app->post('/exportData',function() use($conn,$app){
	    include('./includes/get.exportFiltre.php');
	});

	$app->post('/AfegirResultats',function() use($conn,$app){
	    include('./includes/set.resultats.php');
	});

	$app->delete('/deleteIntro/:guidText',function($guidText) use($conn){
	    include('./includes/delete.text.php');
	});

	$app->put('/updateIntro',function() use($conn,$app){
	    include('./includes/update.text.php');
	});


	$app->post('/setIntro',function() use($conn,$app){
	    include('./includes/set.text.php');
	});

	$app->put('/updateOpcioActiva',function() use($conn,$app){
	    include('./includes/update.opcioActiva.php');
	});
	


	// API CONFIGURACIO LOPD - OPCIONS
	$app->get('/opcionsGenerals',function() use($conn){
	    include('./includes/get.opcion.php');	    
	});

	// API GESTIO LOPD - OPCIONS
	$app->get('/opcionsGeneralsAlumne',function() use($conn,$app){
	    include('./includes/get.opcionAlumne.php');	    
	});

	// API GESTIO LOPD - RESPOSTES
	$app->get('/respostesAlumne',function() use($conn,$app){
	    include('./includes/get.respostesAlumne.php');	    
	});

	$app->get('/alumnesRespostes/:centre',function($centre) use($conn){
	    include('./includes/get.alumnesRespostes.php');	    
	});	

	$app->delete('/deleteOpcio',function() use($conn,$app){
	    include('./includes/delete.opcion.php');
	});	
	// $app->delete('/deleteOpcio/:guidOpcion',function($guidOpcion) use($conn){
	//     include('./includes/delete.opcions.php');
	// });	

	$app->put('/updateOpcio',function() use($conn,$app){
	    include('./includes/update.opcion.php');
	    // include('./includes/update.opcions.php');
	});

	$app->post('/setOpcio',function() use($conn,$app){
	    include('./includes/set.opcion.php');
	});

	$app->post('/setEtapaOpcio',function() use($conn,$app){
	    include('./includes/set.etapaOpcion.php');
	});

	$app->delete('/deleteEtapaOpcio',function() use($conn,$app){
	    include('./includes/delete.etapaOpcion.php');
	});

	$app->get('/historialAlumnesRespostes',function() use($conn,$app){
    	include('./includes/get.historialAlumnesRespostes.php');	    
	});	

	

	$app->run();
