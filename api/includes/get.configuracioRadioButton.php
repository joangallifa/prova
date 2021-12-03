<?php
	// $str = file_get_contents('../data/estadistiques.json');
 //    $json_aux = json_decode($str, true); // decode the JSON into an associative array

 //    $json = json_encode($json_aux);
 //    echo "$json";

    header('Content-Type: application/json; charset=utf-8');
    $sql = $conn->prepare("SELECT * FROM EstadistiquesCentre");
	$sql->execute(array());
    $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
    $json = json_encode($resultats);
	echo mb_convert_encoding($json, "ISO-8859-9", "UTF-8");