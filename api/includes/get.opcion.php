<?php
	// $str = file_get_contents('../data/menjador.json');
 //    $json_aux = json_decode($str, true); // decode the JSON into an associative array

 //    $json = json_encode($json_aux);
 //    echo "$json";
	
	// $nomVista = $_REQUEST['nomVista'];
    
    header('Content-Type: application/json; charset=utf-8');
    // $sql = $conn->prepare("SELECT * FROM RgpdOpcions");
    $sql = $conn->prepare("SELECT RgpdOpcions.*, RgpdEtapesOpcions.etapa, RgpdReceptors.nomReceptor FROM RgpdOpcions INNER JOIN RgpdEtapesOpcions ON RgpdOpcions.guidOpcion = RgpdEtapesOpcions.guidOpcion INNER JOIN RgpdReceptors ON RgpdReceptors.idReceptor = RgpdOpcions.receptor");
    $sql->execute(array());
    $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
     echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
