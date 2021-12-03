<?php
	// $str = file_get_contents('../data/menjador.json');
 //    $json_aux = json_decode($str, true); // decode the JSON into an associative array

 //    $json = json_encode($json_aux);
 //    echo "$json";
	
	// $nomVista = $_REQUEST['nomVista'];
    
    header('Content-Type: application/json; charset=utf-8');
    // $sql = $conn->prepare("SELECT * FROM AlumnesRespostes WHERE guidAluAlexia = :guidAluAlexia");
    $sql = $conn->prepare("SELECT * FROM AlumnesRespostesActualActualitzada WHERE guidAluAlexia = :guidAluAlexia");
    $sql->execute(array('guidAluAlexia'=>$guidAluAlexia));
    $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
     echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
