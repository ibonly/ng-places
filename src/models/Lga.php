<?php

namespace NgPlaces\Api\Models;

use Illuminate\Database\Eloquent\Model;

/**
*
*/
class Lga extends Model
{
	protected $table = "lgas";
	protected $fillables = ['state_code', 'lga_name'];
}