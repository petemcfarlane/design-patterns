<?php

namespace DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Instrument;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Requests\Request;
use DesignPatterns\Mediator\SoundEngineer;

interface Musician
{
    public function instrument() : Instrument;

    public function monitor() : Monitor;

    public function name() : string;

    public function asks(SoundEngineer $engineer, Request $request);
}
