<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator\Instruments;

class Guitar implements Instrument
{
    public function label(): string
    {
        return 'guitar';
    }
}
