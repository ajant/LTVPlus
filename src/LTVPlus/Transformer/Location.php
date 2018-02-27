<?php

declare(strict_types=1);

namespace LTVPlus\Transformer;

use League\Fractal\TransformerAbstract;
use LTVPlus\DTO\Location as LocationDto;

class Location extends TransformerAbstract
{
    public function transform(LocationDto $locationDto)
    {
        return [
            'id' => $locationDto->getId(),
            'lat' => $locationDto->getLat(),
            'lng' => $locationDto->getLng(),
            'zip' => $locationDto->getZip(),
            'type' => $locationDto->getType(),
            'date' => $locationDto->getDate(),
        ];
    }
}
