<?php

declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use LTVPlus\Exception\RecordNotFoundException;

$app->error(function (Throwable $e) use ($app) {
    if ($e instanceof UnexpectedValueException) {
        $code = Response::HTTP_BAD_REQUEST;
    } elseif ($e instanceof NotFoundHttpException) {
        $code = Response::HTTP_NOT_FOUND;
    } elseif ($e instanceof RecordNotFoundException) {
        $code = Response::HTTP_NOT_FOUND;
    } elseif ($e instanceof MethodNotAllowedHttpException) {
        $code = Response::HTTP_METHOD_NOT_ALLOWED;
    } else {
        $message = 'Internal server error';
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        $app['monolog']->error($e->getMessage());
    }

    $message = json_encode(
        ['error' => ['message' => $message ?? $e->getMessage()]],
        JSON_UNESCAPED_UNICODE
    );

    return new Response($message, $code, ['Content-Type' => 'application/json']);
});
