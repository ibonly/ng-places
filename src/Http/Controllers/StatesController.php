<?php

namespace NgPlaces\Api\Controllers;

use Slim\Slim;
use NgPlaces\Api\Utils\ResponseHeaders;

class StatesController
{

	private $headers;

	public function __construct()
	{
		$this->headers = new ResposeHeaders();
	}

	public function getAllStates(Slim $app)
	{

		$response = $this->headers->getJsonHeaders($app);

		//TODO: fetch all the state names from the db
		//TODO: create a response object
		//TODO: cast the db result to json
		//TODO: return the response
	}


	public function getState(Slim $app, string $stateName) 
	{
			$response = $this->headers->getJsonHeaders($app);
	}



	public function getLgas(Slim $app, string $state)
	{
		$reponse = $this->headers->getJsonHeaders($app);


	}


}