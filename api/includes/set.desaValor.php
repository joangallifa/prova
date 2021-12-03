<?php
	$json = $app->request->getBody();
	$jsonA = json_decode($json,true);

	// var_dump($jsonA);

	try {
		foreach ($jsonA as $valor) {
			$sql = $conn->prepare('SET ANSI_WARNINGS ON');
			$sql->execute();
			$sql = $conn->prepare('SET ANSI_NULLS ON');
			$sql->execute();

			$sql = $conn->prepare("LLISTES_DesaValor :guidLlista,:idUsuari,:valor,:clau1,:clau2");
			$sql->execute(array('guidLlista'=>$valor['guidLlista'], 'idUsuari'=>$valor['idUsuari'], 'valor'=>$valor['valor'], 'clau1'=>$valor['clau1'], 'clau2'=>$valor['clau2']));	
			$outA = $sql->fetchAll(PDO::FETCH_ASSOC);


			if (count($outA)>0){
				$jsonO=array('status' => '1','message' => 'S\'ha afegit '.count($outA).' opcio nova', 'guid' => $outA);
			}else{
				$jsonO=array('status' => '0','message' => 'No s\'ha afegit cap opcio');	
			}
		}
	} catch (PDOException $e) {
		$jsonO=array('status' => '0','message' => $e->getMessage());
	}
	// echo json_encode($jsonO);
