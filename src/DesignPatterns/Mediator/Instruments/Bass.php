<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator\Instruments;

class Bass implements Instrument
{
    public function label(): string
    {
        return 'bass';
    }
}
