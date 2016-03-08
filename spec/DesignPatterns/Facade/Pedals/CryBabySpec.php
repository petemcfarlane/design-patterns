<?php

namespace spec\DesignPatterns\Facade\Pedals;

use DesignPatterns\Facade\Pedals\Pedal;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CryBabySpec extends ObjectBehavior
{
    function it_is_a_pedal()
    {
        $this->shouldHaveType(Pedal::class);
    }

    function it_can_rock()
    {
        $this->rock(20);
    }
}
