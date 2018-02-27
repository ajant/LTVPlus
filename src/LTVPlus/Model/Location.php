<?php

declare(strict_types=1);

namespace LTVPlus\Model;

use LTVPlus\DTO\Location as LocationDto;
use LTVPlus\Exception\RecordNotFoundException;

class Location
{

    protected $data;

    public function __construct()
    {
        $this->data = [
            1 => new LocationDto(1, 32.776664, -96.796988, 75211, 'A', '11/20/16 0:00'),
            2 => new LocationDto(2, 32.7493946, -96.9114570, 75211, 'A', '1/16/16 0:00'),
            3 => new LocationDto(3, 32.8813232, -96.8853170, 75229, 'C', '11/29/15 0:00'),
            4 => new LocationDto(4, 32.8878498, -96.8558507, 75229, 'A', '11/28/15 0:00')
        ];
    }

    public function getAll(int $limit = 3, int $page = 1): array
    {
        $loverLimit = ($page - 1) * $limit + 1;
        $upperLimit = $page * $limit;
        if ($loverLimit > count($this->data)) {
            return [];
        }

        $result = [];
        for ($i = $loverLimit; $i <= $upperLimit; $i++) {
            if (array_key_exists($i, $this->data)) {
                $result[] = $this->data[$i];
            } else {
                break;
            }
        }

        return $result;
    }

    /**
     * @throws RecordNotFoundException
     */
    public function getById(int $id): LocationDto
    {
        if (!array_key_exists($id, $this->data)) {
            throw new RecordNotFoundException('Location was not found');
        }

        return $this->data[$id];
    }
}
