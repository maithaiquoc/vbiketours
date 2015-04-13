<?php if(!defined('_lib')) die("Error");

$config_url='localhost:81/VBIKETOURS';


$config['database']['servername'] = 'localhost';



$config['database']['username'] = 'root';



$config['database']['password'] = '';



$config['database']['database'] = 'vbiketours';



$config['database']['refix'] = 'table_';

$config['index_page'] = '';
$config['uri_protocol'] = 'REQUEST_URI';


$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$numSegments = count($segments);
echo $currentSegment = $segments[$numSegments - 1];

if($currentSegment == "admin"){
    header("Location: ".$config_url."/sacviet");
}


?>