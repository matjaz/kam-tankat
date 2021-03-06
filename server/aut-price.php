<?php
//accept CORS requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$checked = $_POST['checked'];
$fuel = $_POST['fuel'];
$lat1 = (float)$_POST['lat1'];
$lat2 = (float)$_POST['lat2'];
$lng1 = (float)$_POST['lng1'];
$lng2 = (float)$_POST['lng2'];

if (($fuel != 'DIE' && $fuel != 'SUP') || ($checked != '' && $checked != 'checked')) {
	header(':', true, 400);
	exit("HTTP 400");
}
$url = 'http://www.spritpreisrechner.at/ts/GasStationServlet';
$data = array('"' . $checked . '"', '"' . $fuel . '"', $lng1, $lat1, $lng2, $lat2);

$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded; charset=UTF-8",
        'method'  => 'POST',
        'content' => 'data=[' . implode(',',$data) . ']'
    )
);

$context  = stream_context_create($options);
echo file_get_contents($url, false, $context);
