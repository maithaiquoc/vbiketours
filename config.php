<?php
if(!defined('_lib')) die("Error");

$config_url='vbiketours.com';

$config['database']['servername'] = 'localhost';

$config['database']['username'] = 'vbiketours';

$config['database']['password'] = '12345678P';

$config['database']['database'] = 'vbiketours_2411';

$config['database']['refix'] = 'table_';

$config['index_page'] = '';

$config['uri_protocol'] = 'REQUEST_URI';

$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$numSegments = count($segments);
$currentSegment = $segments[$numSegments - 1];
if($currentSegment == "admin"){
    header("Location: ".$config_url."/sacviet");
}
?>