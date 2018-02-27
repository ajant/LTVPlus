<?php

declare(strict_types = 1);

use Monolog\Logger;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// register logging provider
$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => '/var/log/location_error.log',
    'monolog.level' => Logger::ERROR,
]);

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => PATH_PROJECT . '/src/LTVPlus/View',
]);
