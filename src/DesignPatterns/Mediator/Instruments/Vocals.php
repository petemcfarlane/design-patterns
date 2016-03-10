<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator\Instruments;

class Vocals implements Instrument
{
    public function label(): string
    {
        return 'vocals';
    }
}
