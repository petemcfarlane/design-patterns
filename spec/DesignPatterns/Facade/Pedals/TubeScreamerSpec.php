<?php

namespace spec\DesignPatterns\Facade\Pedals;

use DesignPatterns\Facade\Pedals\Pedal;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TubeScreamerSpec extends ObjectBehavior
{
    function it_is_a_pedal()
    {
        $this->shouldHaveType(Pedal::class);
    }

    function it_has_an_overdrive_control()
    {
        $this->overdrive()->shouldBe(5);
    }

    function it_has_a_tone_control()
    {
        $this->tone()->shouldBe(5);
    }

    function it_has_a_level_control()
    {
        $this->level()->shouldBe(5);
    }
}
