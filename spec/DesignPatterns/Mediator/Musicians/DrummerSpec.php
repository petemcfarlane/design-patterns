<?php

namespace spec\DesignPatterns\Mediator\Musicians;

use DesignPatterns\Mediator\Instruments\Drums;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Musicians\Musician;
use DesignPatterns\Mediator\SoundEngineer;
use DesignPatterns\Mediator\Requests\TurnDownInMyMonitor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DrummerSpec extends ObjectBehavior
{
    function it_is_a_musician()
    {
        $this->shouldHaveType(Musician::class);
    }

    function it_plays_drums()
    {
        $this->instrument()->shouldHaveType(Drums::class);
    }

    function it_has_a_monitor()
    {
        $this->monitor()->shouldHaveType(Monitor::class);
    }

    function it_has_a_name()
    {
        $this->name()->shouldBe('drums');
    }

    function it_can_ask_the_sound_engineer_for_less_vocals_in_its_monitor(SoundEngineer $engineer)
    {
        $this->asks($engineer, TurnDownInMyMonitor::channel('vocals'));
    }
}
