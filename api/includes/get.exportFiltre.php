<?php
	$json = $app->request->getBody();
	// $json = $app;
	$jsonA = json_decode($json,true);

	// var_dump($json);

	// try {
	// 	foreach ($jsonA as $resposta) {
	// 		var_dump($resposta);
	// 		echo "<br>--------------------------<br>";
	// 	}
		
	// } catch (PDOException $e) {
	// 	$jsonO=array('status' => '0','message' => $e->getMessage());
	// }
	// // echo json_encode($jsonO);
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');