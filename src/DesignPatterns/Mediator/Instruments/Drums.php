<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator\Instruments;

class Drums implements Instrument
{
    public function label(): string
    {
        return 'drums';
    }
}
