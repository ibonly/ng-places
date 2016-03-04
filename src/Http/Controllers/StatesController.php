<?php

namespace NgPlaces\Api\Controllers;

use Slim\Slim;
use NgPlaces\Api\Models\State;
use NgPlaces\Api\Utils\ResponseHeaders;


class StatesController
{

	private $headers;
	private $app;
	private $lga;
	private $state;

	public function __construct(Slim $app)
	{
		$this->app = $app;
		$this->state = new State();
		$this->headers = new ResponseHeaders();
		$this->lga = new LgaController($this->app);
	}

	public function getAll()
	{
		$response = $this->headers->getJsonHeaders($this->app);


		try {
			$states = json_encode($this->state->getAll());
			$response->body($states);
			$response->status(200);	
		}catch(Excption $e) {
			$response->body(json_encode(['error', 'An error occured']));
			$response->status(500);
		}

		return $response;
	}

	public function getState(string $stateName) 
	{
		$response = $this->headers->getJsonHeaders($this->app);

		try {
			$state = json_encode($this->state->where(['state_name' => $stateName])->all());
			$response->status(200);
			$response->body($state);

		} catch(Excepton $e) {
			$response->status(404);
			$response->body(['error' => 'Not found']);
		}

		return $response;
	}



	public function getLgas(string $state)
	{
		$stateLgas = $this->lga->getStateLgas($state);
		return $stateLgas;
	}


}