<?php

	$json = $app->request->getBody();
	$jsonA = json_decode($json,true);

	// var_dump($jsonA);

	try {
		foreach ($jsonA as $opcio) {
			$sql = $conn->prepare('SET ANSI_WARNINGS ON');
			$sql->execute();
			$sql = $conn->prepare('SET ANSI_NULLS ON');
			$sql->execute();

			$sql = $conn->prepare("DELETE FROM RgpdEtapesOpcions WHERE guidOpcion = :guidOpcion AND etapa = :etapa");
			// $sql = $conn->prepare("DELETE FROM RgpdEtapesOpcions WHERE guidOpcion = :guidOpcion");
			$sql->execute(array('guidOpcion'=>$opcio['guidOpcion'], 'etapa'=>$opcio['etapa']));	
			$outA = $sql->rowCount();
			// $outA = $sql->fetchAll(PDO::FETCH_ASSOC);
			/*var_dump($outA);
			die();*/
			if (count($outA)>0){
				$jsonO=array('status' => '1','message' => 'S\'ha eliminat '.count($outA).' etapa a la opcio');
			}else{
				$jsonO=array('status' => '0','message' => 'No s\'ha eliminat cap etapa');	
			}
		}
		// die();
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);
    
    // header('Content-Type: application/json; charset=utf-8');
    // $sql = $conn->prepare("DELETE FROM RgpdOpcions output deleted.guidOpcion WHERE guidOpcion = :guidOpcion");
    // $sql->execute(array('guidOpcion'=>$guidOpcion));
    // $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($resultats);
    // // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
