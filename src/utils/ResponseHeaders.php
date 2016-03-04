<?php

namespace NgPlaces\Api\Utils;

use Slim\Slim;

class ResponseHeaders
{

	public function getJsonHeaders(Slim $app)
	{
		$response = $app->response();
		$reponse->header('Content-Type', 'application/json');
		
		return $response;
	}
}