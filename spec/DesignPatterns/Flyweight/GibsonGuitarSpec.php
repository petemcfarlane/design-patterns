<?php

namespace spec\DesignPatterns\Flyweight;

use DesignPatterns\Flyweight\Amplifier;
use DesignPatterns\Flyweight\Guitar;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GibsonGuitarSpec extends ObjectBehavior
{
    function it_is_a_guitar()
    {
        $this->shouldImplement(Guitar::class);
    }

    function it_can_be_played_through_an_amp(Amplifier $amplifier)
    {
        $this->playThroughAmplifier($amplifier);
        $amplifier->pluginGuitar($this)->shouldHaveBeenCalled();
    }
}
