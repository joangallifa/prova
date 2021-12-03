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
    $sql = $conn->prepare("donaFamiliarsAlumne :guidAluAlexia");
    $sql->execute(array('guidAluAlexia'=>$guidAluAlexia));

    $outA = $sql->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($outA);
    // echo json_encode($outA);     
    if (count($outA)>0){
        $jsonO = array('status' => '1','message' => 'S\'ha trobat '.count($outA).' resposta per a pare/fill');
        $jsonO['results']=$outA;
    }else{
        $jsonO=array('status' => '0','message' => 'No s\'ha trobat cap resposta pare/fill'); 
        $jsonO['results']=$outA;  
    }

     echo json_encode($jsonO);
    // $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
     // echo json_encode($resultats);
    // echo json_encode($resultats, JSON_UNESCAPED_UNICODE);
