<?php

namespace spec\DesignPatterns\Facade\Pedals;

use DesignPatterns\Facade\Pedals\Pedal;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DelayPedalSpec extends ObjectBehavior
{
    function it_is_a_pedal()
    {
        $this->shouldHaveType(Pedal::class);
    }

    function it_has_a_speed_control()
    {
        $this->speed()->shouldBe(2);
    }

    function it_has_a_mix_control()
    {
        $this->mix()->shouldBe(0.2);
    }

    function it_has_a_feedback_control()
    {
        $this->feedback()->shouldBe(0.4);
    }
}
