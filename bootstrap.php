<?php

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;



$capsule->addConnection([

   "driver" => "mysql",

   "host" =>"127.0.0.1",
   "username" => "dok4niso_main",
   "password" => "o^PSWu;na;zi",
   "database" => "dok4niso_moto",
   'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();