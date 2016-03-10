<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Bass;
use DesignPatterns\Mediator\Outputs\Monitor;

class Bassist extends AbstractMusician implements Musician
{
    public function __construct(string $name = 'bass')
    {
        $this->instrument = new Bass();
        $this->monitor = Monitor::labeled('bass');
        $this->name = $name;
    }
}
