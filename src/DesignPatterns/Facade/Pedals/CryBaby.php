<?php

namespace DesignPatterns\Facade\Pedals;

class CryBaby implements Pedal
{
    use Bypassable;

    private $rockSpeed;

    public function rock($speed)
    {
        $this->rockSpeed = $speed;
    }
}
