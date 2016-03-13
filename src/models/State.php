<?php

namespace NgPlaces\Api\Models;

use Ibonly\PotatoORM\Model;
/**
*
*/
class State extends Model
{
	protected $fillables = ['state_code', 'state_name', 'state_capital'];
}