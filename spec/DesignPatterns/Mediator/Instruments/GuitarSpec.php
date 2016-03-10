<?php

namespace spec\DesignPatterns\Mediator\Instruments;

use DesignPatterns\Mediator\Instruments\Instrument;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuitarSpec extends ObjectBehavior
{
    function it_is_an_input_signal()
    {
        $this->shouldImplement(Instrument::class);
    }
}
