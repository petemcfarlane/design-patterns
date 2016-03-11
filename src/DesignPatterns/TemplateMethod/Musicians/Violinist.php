<?php

namespace DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Violin;

class Violinist extends Musician
{
    public function __construct(Violin $violin)
    {
        parent::__construct($violin);
        $this->instrument = $violin;
    }

    public function play()
    {
        $this->instrument->bow();
    }
}
