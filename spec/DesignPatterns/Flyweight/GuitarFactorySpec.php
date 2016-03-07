<?php

namespace spec\DesignPatterns\Flyweight;

use DesignPatterns\Flyweight\FenderGuitar;
use DesignPatterns\Flyweight\GibsonGuitar;
use DesignPatterns\Flyweight\GretchGuitar;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuitarFactorySpec extends ObjectBehavior
{
    function it_can_make_a_guitar()
    {
        $this->makeGuitar('gibson')->shouldHaveType(GibsonGuitar::class);
        $this->makeGuitar('fender')->shouldHaveType(FenderGuitar::class);
    }

    function it_returns_the_same_intrinsic_guitar_from_the_factory()
    {
        $this->makeGuitar('gibson')->shouldEqual($this->makeGuitar('gibson'));
    }

}
