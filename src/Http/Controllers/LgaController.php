<?php
namespace NgPlaces\APi\Controllers;

use Slim\Slim;
use NgPlaces\Api\Utils\ResponseHeaders;

class LgaController
{

	private $app;
	private $headers;

	public function construct(Slim $app)
	{	
			$this->app = $app;
			$this->headers = new ResponseHeaders();

	}


	public function getAll(string $stateName)
	{
		$response = $this->headers->getJSonHeaders();

		//return all the states
	}
}
