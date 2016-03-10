<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Instruments\Vocals;

class Vocalist extends AbstractMusician implements Musician
{
    public function __construct(string $name = 'vocals')
    {
        $this->instrument = new Vocals();
        $this->monitor = Monitor::labeled('vocals');
        $this->name = $name;
    }
}
