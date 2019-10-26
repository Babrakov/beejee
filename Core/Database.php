<?php
 
namespace Core; 
use Illuminate\Database\Capsule\Manager as Capsule;
use \App\Config;
 
class Database {
 
    function __construct() {
    $capsule = new Capsule;
    $capsule->addConnection([
     'driver'   => Config::DBDRIVER,
     'host'     => Config::DBHOST,
     'database' => Config::DBNAME,
     'username' => Config::DBUSER,
     'password' => Config::DBPASS,
     'charset'  => 'utf8',
     'collation'=> 'utf8_unicode_ci',
     'prefix'   => '',
    ]);
    $capsule->bootEloquent();
}
 
}