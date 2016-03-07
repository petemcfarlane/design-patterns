<?php

namespace DesignPatterns\Command;

use DesignPatterns\Flyweight\Amplifier;
use DesignPatterns\Flyweight\Guitar;

class PlayGuitarCommand implements Command
{
    /**
     * @var Guitar
     */
    private $guitar;

    /**
     * @var Amplifier
     */
    private $amplifier;

    public function __construct(Guitar $guitar, Amplifier $amplifier)
    {
        $this->guitar = $guitar;
        $this->amplifier = $amplifier;
    }

    public function exec()
    {
        $this->guitar->playThroughAmplifier($this->amplifier);
    }
}
