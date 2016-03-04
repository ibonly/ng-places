<?php

require_once('vendor/autoload.php');

use Slim\Slim;


$app = new Slim([
	'debug' => true
]);


$app->get('/', function() use ($app) {
	$response = $app->response();
	$response->header('Content-type', 'application/json');
	$response->body(json_encode(['message' => 'Hello, World']));
	$response->status(200);
	return $response;
});



$app->run();