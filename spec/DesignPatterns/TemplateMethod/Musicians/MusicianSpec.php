<?php

namespace spec\DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Instrument;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MusicianSpec extends ObjectBehavior
{
    function let(Instrument $instrument)
    {
        $this->beConstructedWith($instrument);
    }

    function it_has_an_instrument()
    {
        $this->instrument()->shouldHaveType(Instrument::class);
    }

    function it_can_play_its_instrument(Instrument $instrument)
    {
        $this->play();
        $instrument->play()->shouldHaveBeenCalled();
    }
}
