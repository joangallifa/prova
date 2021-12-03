<?php

    $jsonO = [];
    try {

        $sql = $conn->prepare('SET ANSI_WARNINGS ON');
        $sql->execute();
        $sql = $conn->prepare('SET ANSI_NULLS ON');
        $sql->execute();

        $sql = $conn->prepare("[dbo].[LLISTES_DonaLlistesUsuari] :login");
        $sql->execute(array('login'=>$login)); 
        $outA = $sql->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($outA);
   
        if (count($outA)>0){
            $jsonO = array('status' => '1','message' => 'S\'ha trobat '.count($outA).' llistats per a ' . $login);
            $jsonO['results']=$outA;
        }else{
            $jsonO=array('status' => '0','message' => 'No s\'ha trobat cap llistat per a ' . $login); 
            $jsonO['results']=$outA;  
        }
        
    } catch (PDOException $e) {
        $jsonO=array('status' => '0','message' => $e->getMessage());
    }
    echo json_encode($jsonO); 
