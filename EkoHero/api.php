<?php
/*
EkoHero API v.0.1
Copyright (c) EkoHero 2014

Get C02 Emissions For DRIVING, TRANSIT, BICYCLING OR WALKING
BETWEEN TWO PLACES
*/

function getGoogleData($origin,$destination) {
	//URL ENCODE PARAMS
	$origin=urlencode($origin);
	$destination=urlencode($destination);

	//GOOGLE DISTANCE MATRIX API URL WITH ORIGIN DESTINATION AND CURRENT TIME
	$google_api_url = "https://maps.googleapis.com/maps/api/directions/json?origin={$origin}&destination={$destination}&sensor=false&mode=[[MODE]]&key=AIzaSyA3ouuEPSaJt5mrn7zh6FD0aVjxjAQxmeQ&departure_time=".(time()+10*60);

	//RESPONSE ARRAY
	$response=array();

	//MODES
	$modes=array("driving","walking","bicycling","transit");
	//ITERATE THROUGH MODES TO CREATE RESPONSE
	foreach($modes as $mode) {
		//INSERT MODE
		$url = str_replace("[[MODE]]",$mode,$google_api_url);
		//GET DATA FROM GOOGLE
		$g_data = json_decode(file_get_contents($url),true);
		//PARSE*
		$g_data = $g_data['routes'][0]['legs'][0];
		//ADD TO RESPONSE
		$response[$mode]=array();
		$response[$mode]['distance']=$g_data['distance']['text'];
		$response[$mode]['duration']=$g_data['duration']['text'];
	}

	return $response;
}




print_r(getGoogleData("Birger Jarlsgatan 46","Uddgränd 5"));

?>
