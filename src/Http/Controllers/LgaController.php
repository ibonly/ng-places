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

	/**
	 * Get all the lgas that belong to a state
	 * 
	 * @param  string $state
	 * @return JSON
	 */
	public function getStateLgas(string $state)
	{
		$lga = $this->state->where(['state_name' => $state])->orWhere(['state_code' => $state])->first()->state_code;
		$lga = $this->lga->where(['state_code' => $lga])->get();

		return $lga;
	}
}
