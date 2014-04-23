<?php
/*
EkoHero API v.0.1
Copyright (c) EkoHero 2014

Get C02 Emissions For DRIVING, TRANSIT, BICYCLING OR WALKING
between two places
*/

function getGoogleData($origin,$destination) {
	//URL ENCODE PARAMS
	$origin=urlencode($origin);
	$destination=urlencode($destination);

	//GOOGLE DIRECTIONS API URL WITH ORIGIN DESTINATION AND CURRENT TIME
	$google_api_url = "https://maps.googleapis.com/maps/api/directions/json?origin={$origin}&destination={$destination}&sensor=false&mode=[[MODE]]&key=AIzaSyA3ouuEPSaJt5mrn7zh6FD0aVjxjAQxmeQ&departure_time=".(time()+10*60);

	//RESPONSE ARRAY
	$response=array();
	//GEO CODES ARRAY
	$geoarr=array();

	//MODES
	$modes=array("driving","walking","bicycling","transit");
	//ITERATE THROUGH MODES TO CREATE RESPONSE
	foreach($modes as $mode) {
		//INSERT MODE
		$url = str_replace("[[MODE]]",$mode,$google_api_url);
		//GET DATA FROM GOOGLE
		$g_data = json_decode(file_get_contents($url),true);

		//CHECK FOR ERRORS
		if($g_data['status'] != "OK") {
			//SET status : FAIL
			die(json_encode(Array("status" => "FAIL")));
		}
		//END ERRORS

		//PARSE
		$g_data = $g_data['routes'][0]['legs'][0];

		//ADD TO RESPONSE
		$response[$mode]=array();
		$response[$mode]['distance']=$g_data['distance']['text'];
		$response[$mode]['duration']=translateTime($g_data['duration']['text']);

		//ADD GEO CODES
		$geoarr['end_location']=$g_data['end_location'];
		$geoarr['start_location']=$g_data['start_location'];

		//ADD GOOGLE LINK
		$response[$mode]['googlelink'] = getGoogleLink($mode,$geoarr);
	}
	return array($response,$geoarr);
}

//GENERATE GOOGLE MAPS LINK
function getGoogleLink($mode,$geoarr) {
	//URL CODES FOR MODES
	$modes_url = Array(
	"driving" => "c",
	"walking" => "w",
	"bicycling" => "b",
	"transit" => "t");

	//GOOGLE LINK
	$link = "https://maps.google.com/maps?saddr=[[STARTLAT]]%2C[[STARTLNG]]&daddr=[[ENDLAT]]%2C[[ENDLNG]]&dirflg=[[MODE]]";

	//SET VALUES
	$link = str_replace("[[STARTLAT]]",$geoarr['start_location']['lat'],$link);
	$link = str_replace("[[STARTLNG]]",$geoarr['start_location']['lng'],$link);
	$link = str_replace("[[ENDLAT]]",$geoarr['end_location']['lat'],$link);
	$link = str_replace("[[ENDLNG]]",$geoarr['end_location']['lng'],$link);
	$link = str_replace("[[MODE]]",$modes_url[$mode],$link);

	return $link;
}

//GET MODE ICON
function getIcon($mode) {
	$modes=array("driving","walking","bicycling","transit");
	$icons=array("ls-icon-car","ls-icon-walking","ls-icon-bicycle","ls-icon-bus");
	return str_replace($modes,$icons,$mode);
}

//TRANSLATE TIME
function translateTime($time) {
	$eng=array("days","day","hours","hour","mins","min");
	$swe=array("d","d","t","t","min","min");
	return str_replace($eng,$swe,$time);
}


//CONVERT BETWEEN UNITS
function unitConvert($co2) {
	$co2 = intval($co2);
	return round($co2/1000,2);
/* DEPRECATED 
	$units=array("ton"=>1000*1000,"kg"=>1000,"g"=>1);
	foreach($units as $unitName=>$unit) {
		if($co2 > $unit) {
			return round($co2/$unit,2)." ".$unitName;
		}
	}
	return $co2." g";*/
}

function getCo2Emissions($location) {
	//COMMUTEGREENER API URL
	$url="http://api.commutegreener.com/api/co2/emissions?startLat=[[STARTLAT]]&startLng=[[STARTLNG]]&endLat=[[ENDLAT]]&endLng=[[ENDLNG]]&format=json";
	//INSERT PARAMS
	$url=str_replace("[[STARTLAT]]",$location['start_location']['lat'],$url);
	$url=str_replace("[[STARTLNG]]",$location['start_location']['lng'],$url);
	$url=str_replace("[[ENDLAT]]",$location['end_location']['lat'],$url);
	$url=str_replace("[[ENDLNG]]",$location['end_location']['lng'],$url);

	//GET DATA
	$data = json_decode(file_get_contents($url),true);
	$data = $data['emissions'];

	//PARSE DATA (DO NOT CHANGE ORDER)
	$modes=array("Bicycle","Walking","Bus","Car, medium");
	$ts_modes=array("bicycling","walking","transit","driving"); //TRANSLATION

	$response=array();
	foreach($data as $mode) {
		//MODE WE ARE LOOKING FOR?
		if(in_array($mode['transportName'],$modes)) {
			//Replace with real name (ts_modes)
			$name=str_replace($modes,$ts_modes,$mode['transportName']);
			$emission=$mode['totalCo2'];
			$response[$name]=unitConvert($emission);
		}
	}

	return $response;
}

function generateJSONresponse($origin,$dest) {
	//GET GOOGLE DATA [0]-modes, [1]-coords
	$g_data = getGoogleData($origin,$dest);
	//GET EMISSIONS
	$emissions = getCo2Emissions($g_data[1]);

	foreach($g_data[0] as $key=>$data) {
		//ADD EMISSIONS
		$g_data[0][$key]['emission'] = $emissions[$key];
		//ADD ICON
		$g_data[0][$key]['icon'] = getIcon($key);
	}

	//ADD STATUS OK
	$g_data[0]['status'] = "OK";

	return json_encode($g_data[0]);
}


//GET REQS
/*PARAMETERS:
origin - start coords or start address
dest - end coors or end address
*/
if(!empty($_GET['origin']) && !empty($_GET['dest'])) {
	echo generateJSONresponse($_GET['origin'],$_GET['dest']);
}

?>
