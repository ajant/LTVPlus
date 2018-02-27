<?php

declare(strict_types=1);

namespace LTVPlus\Controller;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item as FractalItem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use LTVPlus\Exception\RecordNotFoundException;
use LTVPlus\Model\Location as LocationModel;
use LTVPlus\Transformer\Location as LocationTransformer;
use UnexpectedValueException;

class LocationReadController
{
    /**
     * @var LocationModel
     */
    protected $locationModel;

    /**
     * @var LocationTransformer
     */
    protected $transformer;

    public function __construct(
        LocationModel $locationModel,
        Manager $manager,
        LocationTransformer $transformer
    ) {
        $this->locationModel = $locationModel;
        $this->manager = $manager;
        $this->transformer = $transformer;
    }

    /**
     * @throws RecordNotFoundException
     * @throws UnexpectedValueException
     */
    public function get(int $id): Response
    {
        $locationDto = $this->locationModel->getById($id);
        $resource = new FractalItem($locationDto, $this->transformer, 'Location');
        $output = $this->manager->createData($resource);

        return new Response($output->toJson(), Response::HTTP_OK);
    }

    public function getAll(Request $request): Response
    {
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);
        if ($page || $limit) {
            $this->validatePositiveInt($limit, 'Limit');
            $this->validatePositiveInt($page, 'Page');
        }

        $users = $this->locationModel->getAll((int)$limit, (int)$page);

        $resource = new FractalCollection($users, $this->transformer, 'Location');
        $output = $this->manager->createData($resource);

        return new Response($output->toJson(), Response::HTTP_OK);
    }

    /**
     * @throws UnexpectedValueException
     */
    protected function validatePositiveInt($number, string $param): void
    {
        $number = filter_var($number, FILTER_VALIDATE_INT);

        if ($number <= 0) {
            throw new UnexpectedValueException($param . ' must be integer greater then 0');
        }
    }
}
