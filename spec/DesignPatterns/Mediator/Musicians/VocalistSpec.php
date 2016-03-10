<?php

namespace spec\DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Musicians\Musician;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VocalistSpec extends ObjectBehavior
{
    function it_is_a_musician()
    {
        $this->shouldHaveType(Musician::class);
    }

    function it_has_a_name()
    {
        $this->name()->shouldBe('vocals');
    }
}
