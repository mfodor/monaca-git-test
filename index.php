<?php

define('BASE_DIR', __DIR__);

require_once BASE_DIR . '/vendor/autoload.php';

$app = new App\Application();

$app->run();

