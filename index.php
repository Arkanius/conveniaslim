<?php 


require ('Slim/Slim/Slim.php');
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {
echo json_encode('Test');
});

$app->get('/test', function () {
	echo json_encode('testinho');
});


$app->run();

?>