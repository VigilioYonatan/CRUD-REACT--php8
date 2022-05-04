<?php

use Model\ActiveRecord;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->safeLoad();

require_once __DIR__.'/db.php';
require_once __DIR__.'/helpers.php';

ActiveRecord::setDb($cnx);