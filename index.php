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


$app->get('/api/v1/states', function() use ($app) {
	return 'States list';
});


$app->get('/api/v1/states/:state_name', function() use ($app) {
	return 'Name of state, capital city and number of lgas';
});


$app->get('/api/v1/states/:state_name/:lgas', function() use (app) {
	return 'list of lgas in the states',
});



$app->run();