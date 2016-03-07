<?php

namespace spec\DesignPatterns\Flyweight;

use DesignPatterns\Flyweight\Amplifier;
use DesignPatterns\Flyweight\FenderGuitar;
use DesignPatterns\Flyweight\Guitar;
use DesignPatterns\Flyweight\GuitarFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function let(GuitarFactory $guitarFactory)
    {
        $guitarFactory->makeGuitar('fender')->willReturn(new FenderGuitar());
        $this->beConstructedWith($guitarFactory);
    }

    function it_can_get_a_guitar_from_a_factory()
    {
        $this->getGuitar('fender')->shouldHaveType(FenderGuitar::class);
    }
}
