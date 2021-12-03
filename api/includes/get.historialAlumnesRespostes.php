<?php

    $json = $app->request->get('data');
    $jsonA = json_decode($json,true);

    // var_dump($json);
    $jsonO = [];
    try {
        foreach ($jsonA as $dada) {
            // var_dump($value);
            // echo "--------------------------";
            // var_dump($jsonA);
            $sql = $conn->prepare('SET ANSI_WARNINGS ON');
            $sql->execute();
            $sql = $conn->prepare('SET ANSI_NULLS ON');
            $sql->execute();

            $sql = $conn->prepare("RgpdDonaHistorialRespostesUsuari :login, :anyAcademic");
            // $sql = $conn->prepare("RgpdCalculaRespostesUsuari :QuiContesta, :login, :anyAcademic");
            $sql->execute(array('login'=>$dada['login'], 'anyAcademic'=>$dada['anyAcademic'])); 
            $outA = $sql->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($outA);
            // echo json_encode($outA);     
            if (count($outA)>0){
                $jsonO = array('status' => '1','message' => 'S\'ha trobat '.count($outA).' resposta per a alumne/fill - HISTORIAL');
                $jsonO['results']=$outA;
            }else{
                $jsonO=array('status' => '0','message' => 'No s\'ha trobat cap resposta pare/fill - HISTORIAL'); 
                $jsonO['results']=$outA;  
            }
        }
        
    } catch (PDOException $e) {
        $jsonO=array('status' => '0','message' => $e->getMessage());
    }
    echo json_encode($jsonO); 
