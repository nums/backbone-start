<?php
error_reporting(1);


$url = explode('/', $_SERVER['REDIRECT_URL']);


$users = array(
        array(
            'id' => 1,
            'name' => 'Jean'
        ),
        array(
            'id' => 2,
            'name' => 'Robert'
        )
    );

$response = array();
if($url[3] == 'user' && !isset($url[4])) {
    $response['response']['users'] = $users;
}
elseif($url[3] == 'user' && isset($url[4])) {
    $response['response']['user'] = $users[$url[4]-1];
}

ob_end_clean();
echo json_encode($response);

?>