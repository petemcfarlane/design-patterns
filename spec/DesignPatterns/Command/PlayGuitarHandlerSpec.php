<?php

namespace spec\DesignPatterns\Command;

use DesignPatterns\Command\Handler;
use DesignPatterns\Command\PlayGuitarCommand;
use DesignPatterns\Flyweight\Amplifier;
use DesignPatterns\Flyweight\Guitar;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayGuitarHandlerSpec extends ObjectBehavior
{
    function it_is_a_handler()
    {
        $this->shouldHaveType(Handler::class);
    }

    function it_plays_a_given_guitar_through_a_given_amp(PlayGuitarCommand $command, Guitar $guitar, Amplifier $amplifier)
    {
        $command->exec()->shouldBeCalled();
        $this->handle($command);
    }
}
