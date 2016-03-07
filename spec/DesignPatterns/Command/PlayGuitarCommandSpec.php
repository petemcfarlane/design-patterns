<?php

namespace spec\DesignPatterns\Command;

use DesignPatterns\Command\Command;
use DesignPatterns\Flyweight\Amplifier;
use DesignPatterns\Flyweight\Guitar;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayGuitarCommandSpec extends ObjectBehavior
{
    function let(Guitar $guitar, Amplifier $amplifier)
    {
        $this->beConstructedWith($guitar, $amplifier);
    }

    function it_is_a_command()
    {
        $this->shouldHaveType(Command::class);
    }

    function it_plays_a_guitar_through_an_amp(Guitar $guitar, Amplifier $amplifier)
    {
        $this->exec();
        $guitar->playThroughAmplifier($amplifier)->shouldHaveBeenCalled();
    }
}
