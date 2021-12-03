<?php
	// $str = file_get_contents('../data/menjador.json');
 //    $json_aux = json_decode($str, true); // decode the JSON into an associative array

 //    $json = json_encode($json_aux);
 //    echo "$json";
	
	// $nomVista = $_REQUEST['nomVista'];

// $json = $app->request->getBody();
// 	// $json = $app;
// 	$jsonA = json_decode($json,true);

// 	var_dump($json);
    
    header('Content-Type: application/json; charset=utf-8');
    $sql = $conn->prepare("SELECT * FROM EtapaCursSeccio WHERE IdCentro = :centre AND Ejercicio=(dbo.donaCursAcademic(0)) ORDER BY Etapa");
    $sql->execute(array('centre'=>$centre));
    $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
     echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
