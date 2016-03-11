<?php

namespace DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Guitar;

class Guitarist extends Musician
{
    public function __construct(Guitar $guitar)
    {
        parent::__construct($guitar);
        $this->instrument = $guitar;
    }

    public function play()
    {
        $this->strum();
    }

    private function strum()
    {
        $this->instrument->strum();
    }
}
