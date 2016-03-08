<?php

namespace spec\DesignPatterns\Facade\Pedals;

use DesignPatterns\Facade\Pedals\Pedal;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FuzzFaceSpec extends ObjectBehavior
{
    function it_is_a_pedal()
    {
        $this->shouldHaveType(Pedal::class);
    }

    function it_has_a_volume_control()
    {
        $this->volume()->shouldBe(5);
    }

    function it_has_a_fuzz_control()
    {
        $this->fuzz()->shouldBe(8);
    }
}
