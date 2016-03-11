<?php

namespace spec\DesignPatterns\TemplateMethod\Instruments;

use DesignPatterns\TemplateMethod\Instruments\Instrument;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PianoSpec extends ObjectBehavior
{
    function it_is_an_instrument()
    {
        $this->shouldHaveType(Instrument::class);
    }

    function it_can_be_played()
    {
        $this->play();
    }
}
