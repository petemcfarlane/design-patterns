<?php

namespace DesignPatterns\Facade\Pedals;

class DelayPedal implements Pedal
{
    use Bypassable;

    private $speed = 2;
    private $mix = 0.2;
    private $feedback = 0.4;

    public function speed()
    {
        return $this->speed;
    }

    public function mix()
    {
        return $this->mix;
    }

    public function feedback()
    {
        return $this->feedback;
    }
}
