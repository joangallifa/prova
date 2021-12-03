<?php

    $jsonO = [];
    try {

        $sql = $conn->prepare('SET ANSI_WARNINGS ON');
        $sql->execute();
        $sql = $conn->prepare('SET ANSI_NULLS ON');
        $sql->execute();

        $sql = $conn->prepare("[dbo].[LLISTES_DonaInformacioLlista] :guidLlista");
        $sql->execute(array('guidLlista'=>$guidLlista)); 
        $outA = $sql->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($outA);
   
        if (count($outA)>0){
            $jsonO = array('status' => '1','message' => 'S\'ha trobat '.count($outA).' registres');
            $jsonO['resultsInfo']=$outA;

            // FER UNA SEGONA CONSULTA AMB LES DADES REBUDES - ELEMENT SENTENCIA
            $sql = $conn->prepare($outA[0]['sentencia']);
            $sql->execute(); 
            $outB = $sql->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($outB);

            $jsonO['resultsSentencia']=$outB;
        }else{
            $jsonO=array('status' => '0','message' => 'No s\'ha trobat cap registre ');  
        }
        
    } catch (PDOException $e) {
        $jsonO=array('status' => '0','message' => $e->getMessage());
    }
    echo json_encode($jsonO); 
