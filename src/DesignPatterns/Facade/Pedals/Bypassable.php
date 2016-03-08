<?php

namespace DesignPatterns\Facade\Pedals;

trait Bypassable
{
    protected $bypassed = true;

    public function on()
    {
        $this->bypassed = false;
    }

    public function off()
    {
        $this->bypassed = true;
    }

    public function isBypassed()
    {
        return $this->bypassed;
    }
}
