<?php

namespace NgPlaces\Api\Controllers;

use Slim\Slim;
use NgPlaces\Api\Models\Lga;
use NgPlaces\Api\Models\State;
use NgPlaces\Api\Utils\ResponseHeaders;

class LgaController
{

	private $app;
	private $headers;
	private $lga;
	private $state;

	public function __construct(Slim $app)
	{	
			$this->app = $app;
			$this->lga = new Lga();
			$this->state = new State();
			$this->headers = new ResponseHeaders();
	}


	public function getAll()
	{
		$response = $this->headers->getJSonHeaders();

		//return all the states
	}


	public function getStateLgas(string $state)
	{
		$response = $this->headers->getJsonHeaders($this->app);
		
		try{
			$stateCode = $this->state->where(['state_name' => $state])->first()->state_code;
			$lgas = $this->lga->where(['state_code'=> $stateCode])->all();
			$response->status(200);
			$response->body($lgas);
		} catch (DataNotFoundException $e) {
			$response->status(404);
			$response->body(json_encode(['error' => 'Not found']));
		}

		return $response;
	}
}
