<?php

namespace DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Piano;

class Pianist extends Musician
{
    public function __construct(Piano $piano)
    {
        parent::__construct($piano);
        $this->instrument = $piano;
    }
}
