<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Drums;
use DesignPatterns\Mediator\Outputs\Monitor;

class Drummer extends AbstractMusician implements Musician
{
    public function __construct(string $name = 'drums')
    {
        $this->instrument = new Drums();
        $this->monitor = Monitor::labeled('drums');
        $this->name = $name;
    }
}
