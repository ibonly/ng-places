<?php

namespace NgPlaces\Api\Models;

use Illuminate\Database\Eloquent\Model;
/**
*
*/
class State extends Model
{
	protected $table = "states";

	protected $fillables = ['state_code', 'state_name', 'state_capital'];
}