<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Guitar;
use DesignPatterns\Mediator\Outputs\Monitor;

class Guitarist extends AbstractMusician implements Musician
{
    public function __construct(string $name = 'guitar')
    {
        $this->instrument = new Guitar();
        $this->monitor = Monitor::labeled('guitar');
        $this->name = $name;
    }
}
