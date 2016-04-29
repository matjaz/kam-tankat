<?php
//accept CORS requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$url = 'http://www.petrol.eu/api/fuel_prices.json';

echo file_get_contents($url);
