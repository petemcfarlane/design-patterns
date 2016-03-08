<?php

namespace DesignPatterns\Facade\Pedals;

class TubeScreamer implements Pedal
{
    use Bypassable;

    private $overdrive = 5;
    private $tone = 5;
    private $level = 5;

    public function overdrive()
    {
        return $this->overdrive;
    }

    public function tone()
    {
        return $this->tone;
    }

    public function level()
    {
        return $this->level;
    }
}
