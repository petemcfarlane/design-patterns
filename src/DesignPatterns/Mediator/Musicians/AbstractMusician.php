<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Instrument;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Requests\Request;
use DesignPatterns\Mediator\SoundEngineer;

abstract class AbstractMusician implements Musician
{
    protected $instrument;
    protected $monitor;
    protected $name;

    public function instrument(): Instrument
    {
        return $this->instrument;
    }

    public function monitor(): Monitor
    {
        return $this->monitor;
    }

    public function name(): String
    {
        return $this->name;
    }

    public function asks(SoundEngineer $engineer, Request $request)
    {
        $engineer->respondTo($this, $request);
    }
}
