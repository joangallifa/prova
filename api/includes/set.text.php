<?php
	$json = $app->request->getBody();
	$jsonA = json_decode($json,true);

	// var_dump($jsonA);

	try {
		$sql = $conn->prepare('SET ANSI_WARNINGS ON');
		$sql->execute();
		$sql = $conn->prepare('SET ANSI_NULLS ON');
		$sql->execute();

		$sql = $conn->prepare("INSERT INTO RgpdText (text,centre,etapa,tipus) output inserted.guidText VALUES (:text,:centre,:etapa,:tipus)");
		$sql->execute(array('text'=>$jsonA['text'], 'centre'=>$jsonA['centre'], 'etapa'=>$jsonA['etapa'],'tipus'=>$jsonA['tipus']));	
		$outA = $sql->fetchAll(PDO::FETCH_ASSOC);

		
		if (count($outA)>0){
			$jsonO=array('status' => '1','message' => 'S\'ha afegit '.count($outA).' relació pare/fill', 'guid' => $outA);
		}else{
			$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap relació pare/fill');	
		}
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);
