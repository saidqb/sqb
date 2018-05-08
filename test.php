<?php
require_once('sqb.php');

$yyyyyyyy = array('dpp','dpc');

$array_intersect = array_intersect($yyyyyyyy,array('dpp','dpd','dpc'));


$hhhh = 'aaaaa';
print_r(explode('|', $hhhh));

echo "============================== \n";

$data = array(
	'get_rp' => sqb()->ntv->currency->rp(100000),
	'get_rp' => sqb()->ntv->currency->remove('Rp 1000.0000'),
	'dddd' => sqb()->ntd,
	'dd' => sqb()->ntsssssssssssd,
	'path' => DIRECTORY_SEPARATOR,
	'sqb' => new sqb,
	'url' =>  sqb()->ntv->url->current(),
	$_SERVER['SERVER_NAME'],
	curPageURL(),
	sqb()->ntv->url->segment(),
	$_SERVER["SERVER_PORT"],
	DIRECTORY_SEPARATOR,
	sqb()->ntv->bootstrap->v(37)->alert()
);
header('Content-Type: text/plain');
print_r($data);

function curPageURL() 
{
    $url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
return $dir;
}