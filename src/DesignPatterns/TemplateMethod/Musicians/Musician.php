<?php

namespace DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Instrument;

class Musician
{
    /**
     * @var Instrument
     */
    protected $instrument;

    public function __construct(Instrument $instrument)
    {
        $this->instrument = $instrument;
    }

    public function instrument()
    {
        return $this->instrument;
    }

    public function play()
    {
        $this->instrument->play();
    }
}
