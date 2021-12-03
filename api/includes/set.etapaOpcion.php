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

			$sql = $conn->prepare("INSERT INTO RgpdEtapesOpcions (etapa, guidOpcion) VALUES (:etapa,:guidOpcion)");
			$sql->execute(array('etapa'=>$opcio['etapa'], 'guidOpcion'=>$opcio['guidOpcion']));	
			// $outA = $sql->fetchAll(PDO::FETCH_ASSOC);
			$outA = $sql->rowCount();
			
			if (count($outA)>0){
				$jsonO=array('status' => '1','message' => 'S\'ha afegit '.count($outA).' etapa x opcio', 'guid' => $outA);
			}else{
				$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap relació pare/fill');	
			}
		}
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);
