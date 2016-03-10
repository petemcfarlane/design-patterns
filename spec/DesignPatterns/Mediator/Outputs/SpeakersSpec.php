<?php

namespace spec\DesignPatterns\Mediator\Outputs;

use DesignPatterns\Mediator\Outputs\Output;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpeakersSpec extends ObjectBehavior
{
    function it_is_an_output()
    {
        $this->shouldHaveType(Output::class);
    }
}
