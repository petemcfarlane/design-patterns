<?php

namespace DesignPatterns\Flyweight;

class GibsonGuitar implements Guitar
{
    public function playThroughAmplifier(Amplifier $amplifier)
    {
        $amplifier->pluginGuitar($this);
    }
}
