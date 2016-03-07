<?php

namespace DesignPatterns\Flyweight;

class FenderGuitar implements Guitar
{
    public function playThroughAmplifier(Amplifier $amplifier)
    {
        $amplifier->pluginGuitar($this);
    }
}
