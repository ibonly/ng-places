<?php 

namespace NgPlaces\Api\Database;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$dotenv = new Dotenv($_SERVER['DOCUMENT_ROOT']);

$dotenv->load();

$capsule->addConnection([
    'driver'    => getenv('DATABASE_DRIVER'),
    'host'      => getenv('DATABASE_HOST'),
    'database'  => getenv('DATABASE_NAME'),
    'username'  => getenv('DATABASE_USER'),
    'password'  => getenv('DATABASE_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();