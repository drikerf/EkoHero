<?php


function convertCarbon($type, $co2){
	// Get data from carbon.to
	$data = file_get_contents("http://carbon.to/".$type.".json?co2=".$co2);
	// Decode the data
	$data =	json_decode($data, true);
	// Return the co amount
	return $data['conversion']['amount'];
}

function randomType($co2){
	// Get the data
	$data = file_get_contents("http://carbon.to/all.json?".$co2);
	// Decode the data
	$data = json_decode($data, true);
	// Get a random key
	$randomKey = array_rand($data);
	// Return the random item
	return $data[$randomKey]['conversion']['name'];
}

echo convertCarbon($_GET['type'], $_GET['co2']);
echo randomType($_GET['co2']);

?>