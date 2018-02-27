<?php

declare(strict_types = 1);

use LTVPlus\Controller\DemonstrationController;
use LTVPlus\Controller\DocumentationController;
use LTVPlus\Controller\LocationReadController;
use LTVPlus\Converter\ToInteger;

# DemonstrationController
$app->get('/demonstration', DemonstrationController::class . ':get');

# DocumentationController
$app->get('/documentation', DocumentationController::class . ':get');

# LocationController
$app->get('/locations/{id}', LocationReadController::class . ':get')
    ->assert('id', '\d+')
    ->convert('id', ToInteger::class . ':convert');
$app->get('/locations', LocationReadController::class . ':getAll');
