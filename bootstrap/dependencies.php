<?php

declare(strict_types=1);

use League\Fractal\Manager;
use League\Fractal\Serializer\DataArraySerializer;
use LTVPlus\Controller\DemonstrationController;
use Silex\Application;
use LTVPlus\Controller\DocumentationController;
use LTVPlus\Controller\LocationReadController;
use LTVPlus\Converter\ToInteger;
use LTVPlus\Model\Location as LocationModel;
use LTVPlus\Transformer\Location as LocationTransformer;

(function (Application $app) {
    addControllers($app);
    addConverters($app);
    addModels($app);
    addTransformers($app);
    addVendor($app);
})($app);

function addControllers(Application $app): void
{
    $app[DemonstrationController::class] = $app->factory(function () use ($app) {
        return new DemonstrationController(
            $app['twig']
        );
    });
    $app[DocumentationController::class] = $app->factory(function () use ($app) {
        return new DocumentationController(
            $app['twig']
        );
    });
    $app[LocationReadController::class] = $app->factory(function () use ($app) {
        return new LocationReadController(
            $app[LocationModel::class],
            $app[Manager::class],
            $app[LocationTransformer::class]
        );
    });
}

function addConverters(Application $app): void
{
    $app[ToInteger::class] = $app->factory(function () {
        return new ToInteger();
    });
}

function addModels(Application $app): void
{
    $app[LocationModel::class] = $app->factory(function () use ($app) {
        return new LocationModel();
    });
}

function addTransformers(Application $app): void
{
    $app[LocationTransformer::class] = $app->factory(function () {
        return new LocationTransformer();
    });
}

function addVendor(Application $app): void
{
    $app[Manager::class] = $app->factory(function () {
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        return $manager;
    });
}
