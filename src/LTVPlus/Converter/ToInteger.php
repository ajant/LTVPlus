<?php

declare(strict_types = 1);

namespace LTVPlus\Converter;

class ToInteger
{
    public function convert($var): int
    {
        return (int)$var;
    }
}
