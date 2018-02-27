<?php

declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->after(function (Request $request, Response $response) use ($app) {
    $response->headers->set('Access-Control-Allow-Origin', ACCESS_CONTROL_ALLOW_ORIGIN);
    $response->headers->set('Access-Control-Allow-Methods', ACCESS_CONTROL_ALLOW_METHODS);
    if (strpos($request->getRequestUri(), '/locations') === 0) {
        $response->headers->set('Content-Type', CONTENT_TYPE_JSON);
    } else {
        $response->headers->set('Content-Type', CONTENT_TYPE_HTML);
    }
});
