<?php

// AGREGAR SEGURIDAD X DOMINIO ETC.

// we check if requested via AJAX
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"
	&& $_POST['submit'] != ""){
	// we parse the submited $.post vars
	$dias = explode(",", $_POST['submit']);
	// remove the latest empty item in array
	array_pop($dias);
	// set first and last day
	$first = explode("|", $dias[0]);
	$last = explode("|", end($dias));
	$meses = array(
		"january" => 1,
		"february" => 2,
		"march" => 3,
		"april" => 4,
		"may" => 5,
		"june" => 6,
		"july" => 7,
		"august" => 8,
		"september" => 9,
		"october" => 10,
		"november" => 11,
		"december" => 12
	);
	// do some interaction with DB
	// response
	if(rand(0, 9) > 8){
		die("ERROR");
	}
	
	if(count($dias) == 1){
		echo "RESERVADO: ".$first[0]."/".$meses[$first[1]];
	}else{
		echo "RESERVADO: del ".$first[0]."/".$meses[$first[1]]." al ".$last[0]."/".$meses[$last[1]];
	}
}