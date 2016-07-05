<?php

require_once('vendor/autoload.php');
require_once('src/Http/Database/database.php');

use Slim\Slim;
use NgPlaces\Api\Controllers\StatesController;

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
		$statesController = new StatesController($app);
		return $statesController->getAll();
});

$app->get('/api/v1/states/:state_name', function($stateName) use ($app) {
	$statesController = new StatesController($app);
	return $statesController->getState($stateName);
});

$app->get('/api/v1/states/:state_name/lgas', function($stateName) use ($app) {
		$statesController = new StatesController($app);
		return $statesController->getLgas($stateName);
});



$app->run();