<?php
error_reporting(1);
set_time_limit(0);

require '../config.php';

function getSslPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if($_GET['ogdebug'] == 1) {
	echo getSslPage('https://developers.facebook.com/tools/debug/og/object?q='.$_GET['url']);
	echo 1;
	exit;
}

$uri = explode('router/', $_SERVER['REQUEST_URI']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, WS_API.$uri[1]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, 0);	
curl_setopt($ch, CURLOPT_VERBOSE, 1);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
	curl_setopt($ch, CURLOPT_POST, 1);
}
if($_SERVER['REQUEST_METHOD'] == 'PUT') {
	$file = stream_get_contents(fopen('php://input','r'));
	$putData = tmpfile();
	fwrite($putData, $file);
	fseek($putData, 0);
	curl_setopt($ch, CURLOPT_INFILE, $putData);
	curl_setopt($ch, CURLOPT_INFILESIZE, strlen($file));
	curl_setopt($ch, CURLOPT_PUT, true);
}
echo curl_exec($ch);
?>