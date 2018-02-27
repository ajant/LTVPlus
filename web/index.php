<?php

declare(strict_types = 1);

//ini_set('display_errors', '0');
error_reporting(E_ALL);

require_once realpath(__DIR__ . '/../') . '/bootstrap/constants.php';
require_once '../vendor/autoload.php';

$app = new Silex\Application();

try {
    require_once '../bootstrap/bootstrap.php';

    $app->run();
} catch (Throwable $e) {
    http_response_code(500);
    header('Access-Control-Allow-Origin: ' . ACCESS_CONTROL_ALLOW_ORIGIN);
    header('Access-Control-Allow-Methods: ' . ACCESS_CONTROL_ALLOW_METHODS);
    header('Content-Type: ' . CONTENT_TYPE_JSON);

    $app['monolog']->error($e->getMessage());

    echo json_encode(['error' => ['message' => 'Internal server error']]);
}
