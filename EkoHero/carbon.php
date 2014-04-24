<?php


function convertCarbon($type, $co2){
	// Get data from carbon.to
	$data = file_get_contents("http://carbon.to/".$type.".json?co2=".$co2);
	// Decode the data
	$data =	json_decode($data, true);
	// Return the co amount
	return $data['conversion']['amount'];
}

function randomCarbon(){
	// Get the data
	$data = file_get_contents("http://carbon.to/all.json");
	// Decode the data
	$data = json_decode($data, true);
	
	return $data[randomKey()]['conversion'];
}

function randomKey(){
	$keys = array(
		'apples' => 1,
		'carrots' => 7,
		'rice' => 18,
		'beers' => 22);
	// Get a random key
	$randomKey = array_rand($keys);
	return $keys[$randomKey];
}

function translateUnit($unit){
	// The units in english
	$dataEnglish = array("hours lit lightbulb", "apples", "bananas", "hours flying", "km of flight",
		"km by train", "km by subway", "carrots", "cups of tea", "hours using a laptop", "km by car", 
		"mobile phone charges", "tomatoes", "liters of milk", "kg of beef", "years running a fridge",
		"hours watching TV", "kg of salmon", "portions of rice", "kg of shrimps", "loafs of bread",
		"years heating a flat", "bottles of beer", "kg of CO2");
	// The units in swedish
	$dataSwedish = array("ljustimmar från en glödlampa","äpplen","bananer",
		"flygtimmar","km med flyg","km med tåg","km med tunnelbana","morötter",
		"tekoppar","timmar av laptopanvändning","km med bil","mobilladdningar",
		"tomater","liter mjölk","kg kött","år med frys igång","tvtimmar","kg lax",
		"portioner ris","kg räkor","brödskivor","år av uppvärmning av lägenhet",
		"ölflaskor","kg CO2");
	// Translate to swedish
	return str_replace($dataEnglish, $dataSwedish, $unit);
}

//echo convertCarbon($_GET['type'], $_GET['co2']);
//echo randomType($_GET['co2']);
?>
