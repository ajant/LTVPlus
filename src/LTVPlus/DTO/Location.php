<?php

namespace LTVPlus\DTO;

class Location
{
    protected $validTypes = ['A', 'B', 'C'];

    /**
     * @var int
     */
    protected $id;

    /**
     * @var double
     */
    protected $lat;

    /**
     * @var double
     */
    protected $lng;

    /**
     * @var int
     */
    protected $zip;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $date;

    public function __construct(int $id, float $lat, float $lng, int $zip, string $type, string $date)
    {
        if (!in_array($type, $this->validTypes)) {
            throw new \UnexpectedValueException('Invalid type: ' . $type);
        }

        $this->id = $id;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->zip = $zip;
        $this->type = $type;
        $this->date = $date;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function getZip(): int
    {
        return $this->zip;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
