<?php

namespace DesignPatterns\Facade\Pedals;

class FuzzFace implements Pedal
{
    use Bypassable;

    private $volume = 5;
    private $fuzz = 8;

    public function volume()
    {
        return $this->volume;
    }

    public function fuzz()
    {
        return $this->fuzz;
    }
}
