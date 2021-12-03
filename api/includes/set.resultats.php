<?php
	$json = $app->request->getBody();
	// $json = $app;
	$jsonA = json_decode($json,true);

	// var_dump($json);
	$jsonO = [];
	try {
		foreach ($jsonA as $resposta) {
			// var_dump($value);
			// echo "--------------------------";
			// var_dump($jsonA);
			$sql = $conn->prepare('SET ANSI_WARNINGS ON');
			$sql->execute();
			$sql = $conn->prepare('SET ANSI_NULLS ON');
			$sql->execute();

			$sql = $conn->prepare("INSERT INTO RgpdRespostes (guidOpcion,guidAluAlexia,resposta,origen,nifSignatura,data,anyAcademic) output inserted.guidResposta, inserted.guidOpcion VALUES (:guidOpcion,:guidAluAlexia,:resposta,:origen,:nifSignatura,:data,:anyAcademic)");
			$sql->execute(array('guidOpcion'=>$resposta['guidOpcion'], 'guidAluAlexia'=>$resposta['guidAluAlexia'], 'resposta'=>$resposta['resposta'], 'origen'=>$resposta['origen'], 'nifSignatura'=>$resposta['nifSignatura'], 'data'=>$resposta['data'], 'anyAcademic'=>$resposta['anyAcademic']));	
			$outA = $sql->fetchAll(PDO::FETCH_ASSOC);
			// array_push($outA, 'guidOpcion'=>$resposta['guidOpcion'])


			// var_dump($sql);			
			if (count($outA)>0){
				array_push($jsonO,array('status' => '1','message' => 'S\'ha afegit '.count($outA).' relació pare/fill', 'guid' => $outA));
			}else{
				$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap relació pare/fill');	
			}
		}
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);
