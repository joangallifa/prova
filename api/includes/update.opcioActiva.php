<?php
	$json = $app->request->getBody();
	$jsonA = json_decode($json,true);

	try {
		$sql = $conn->prepare('SET ANSI_WARNINGS ON');
		$sql->execute();
		$sql = $conn->prepare('SET ANSI_NULLS ON');
		$sql->execute();

		$sql = $conn->prepare("SELECT actiu FROM RgpdOpcions WHERE guidOpcion = '".$jsonA['guidOpcion']."'");
		$sql->execute();
		$valorActiu = $sql->fetchAll(PDO::FETCH_ASSOC);

		if ($valorActiu[0]['actiu'] == '1') {
			// CANVIAR A 0
			$sql = $conn->prepare("UPDATE RgpdOpcions SET actiu = '0' WHERE guidOpcion = '".$jsonA['guidOpcion']."'");
			$sql->execute();
			$outA = $sql->fetchAll(PDO::FETCH_ASSOC);
		}else{
			//CANVIAR A 1
			$sql = $conn->prepare("UPDATE RgpdOpcions SET actiu = '1' WHERE guidOpcion = '".$jsonA['guidOpcion']."'");
			$sql->execute();
			$outA = $sql->fetchAll(PDO::FETCH_ASSOC);
		}	
		
		if (count($outA)>0){
			$jsonO=array('status' => '1','message' => 'S\'ha afegit '.count($outA).' relació pare/fill');
		}else{
			$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap relació pare/fill');	
		}
		
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	echo json_encode($jsonO);
