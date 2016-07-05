<?php

namespace NgPlaces\Api\Controllers;

use Exception;
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

	/**
	 * Return all states
	 * 
	 * @return JSON
	 */
	public function getAll()
	{
		$response = $this->headers->getJsonHeaders($this->app);

		try {
			$response->body($this->state->all());
			$response->status(200);	
		}catch(Exception $e) {
			$response->body(json_encode(['error', 'An error occured']));
			$response->status(500);
		}

		return $response->body();
	}

	/**
	 * Return the details of a particular state
	 * 
	 * @param  string $stateName
	 * @return JSON
	 */
	public function getState(string $stateName) 
	{
		$response = $this->headers->getJsonHeaders($this->app);

		try {
			$state = $this->state->where(['state_name' => $stateName])->get();
			$response->status(200);
			$response->body($state);

		} catch(Excepton $e) {
			$response->status(404);
			$response->body(['error' => 'Not found']);
		}

		return $response;
	}

	/**
	 * Return all the lgas of a state
	 * 
	 * @param  string $state
	 * @return JSON
	 */
	public function getLgas(string $state)
	{
		$response = $this->headers->getJsonHeaders($this->app);

		try {
			$stateLgas = $this->lga->getStateLgas($state);
			$response->status(200);
			$response->body($stateLgas);

		} catch(Excepton $e) {
			$response->status(404);
			$response->body(['error' => 'Not found']);
		}

		return $response;
	}


}