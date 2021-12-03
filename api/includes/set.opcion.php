<?php
	$json = $app->request->getBody();
	$jsonA = json_decode($json,true);

	// var_dump($jsonA);

	try {
		foreach ($jsonA as $opcio) {
			// echo $opcio['text'] . "<br>";
			// echo $opcio['centre'] . "<br>";
			// echo $opcio['descripcio'] . "<br>";
			// echo $opcio['actiu'] . "<br>";

			// echo $opcio['receptor'] . "<br>";
			$sql = $conn->prepare('SET ANSI_WARNINGS ON');
			$sql->execute();
			$sql = $conn->prepare('SET ANSI_NULLS ON');
			$sql->execute();

			$sql = $conn->prepare("INSERT INTO RgpdOpcions (text,centre,descripcio,actiu,receptor) output inserted.guidOpcion VALUES (:titol,:centre,:descripcio,:actiu,:receptor)");
			$sql->execute(array('titol'=>$opcio['text'], 'centre'=>$opcio['centre'], 'descripcio'=>$opcio['descripcio'], 'actiu'=>$opcio['actiu'], 'receptor'=>$opcio['receptor']));	
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
	echo json_encode($jsonO);
