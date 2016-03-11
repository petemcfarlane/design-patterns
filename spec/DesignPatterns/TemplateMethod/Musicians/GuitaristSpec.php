<?php

namespace spec\DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Guitar;
use DesignPatterns\TemplateMethod\Musicians\Musician;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuitaristSpec extends ObjectBehavior
{
    function let(Guitar $guitar)
    {
        $this->beConstructedWith($guitar);
    }

    function it_is_a_musician()
    {
        $this->shouldHaveType(Musician::class);
    }

    function it_has_a_guitar_as_an_instrument()
    {
        $this->instrument()->shouldHaveType(Guitar::class);
    }

    function it_can_play_the_guitar(Guitar $guitar)
    {
        $this->play();
        $guitar->strum()->shouldHaveBeenCalled();
    }
}
