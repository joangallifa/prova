<?php
	// $str = file_get_contents('../data/menjador.json');
 //    $json_aux = json_decode($str, true); // decode the JSON into an associative array

 //    $json = json_encode($json_aux);
 //    echo "$json";
	
	// $nomVista = $_REQUEST['nomVista'];
    
    // header('Content-Type: application/json; charset=utf-8');
    // $sql = $conn->prepare("SELECT * FROM $nomVista");
    // $sql->execute(array());
    // $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
    //  echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
	
	// $nomVista = $_REQUEST['nomVista'];
    // $json = $app->request->post('data');
    $json = $app->request->getBody();
	$jsonA = json_decode($json,true);



	try {
		$sql = $conn->prepare('SET ANSI_WARNINGS ON');
		$sql->execute();
		$sql = $conn->prepare('SET ANSI_NULLS ON');
		$sql->execute();

		$sql = $conn->prepare("UPDATE RgpdText SET text = :text, etapa = :etapa output inserted.guidText WHERE guidText = :guidText");
		$sql->execute(array('text'=>$jsonA['text'], 'etapa'=>$jsonA['etapa'], 'guidText'=>$jsonA['guidText']));	
		$outA = $sql->fetchAll(PDO::FETCH_ASSOC);

		
		if (count($outA)>0){
			$jsonO=array('status' => '1','message' => 'S\'ha afegit '.count($outA).' relació pare/fill');
		}else{
			$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap relació pare/fill');	
		}
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);

	//-------------------------------

	// var_dump($jsonA);
    // header('Content-Type: application/json; charset=utf-8');
    // $sql = $conn->prepare("UPDATE RgpdOpcions SET text = :text, descripcio = :descripcio, etapa = :etapa output inserted.guidOpcion WHERE guidOpcion = :guidOpcion");
    // $sql->execute(array('text'=>$jsonA['text'],'descripcio'=>$jsonA['descripcio'],'etapa'=>$jsonA['etapa'],'guidOpcion'=>$jsonA['guidOpcion']));
    // $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
    //  echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);

