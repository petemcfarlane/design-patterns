<?php

namespace spec\DesignPatterns\Memento;

use DesignPatterns\Memento\Preset;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuitarAmplifierSpec extends ObjectBehavior
{
    function it_has_some_controls()
    {
        $this->gain()->shouldReturn(5);
        $this->treble()->shouldReturn(5);
        $this->mid()->shouldReturn(5);
        $this->bass()->shouldReturn(5);
        $this->level()->shouldReturn(5);
    }

    function it_can_save_the_settings_as_a_preset()
    {
        $this->savePreset()->shouldHaveType(Preset::class);
    }

    function it_can_load_a_preset(Preset $preset)
    {
        $preset->getSettings()->willReturn([
            'gain' => 11,
            'treble' => 4,
            'mid' => 7,
            'bass' => 5,
            'level' => 2,
        ]);

        $this->fromPreset($preset);
        $this->gain()->shouldBe(11);
        $this->treble()->shouldReturn(4);
        $this->mid()->shouldReturn(7);
        $this->bass()->shouldReturn(5);
        $this->level()->shouldReturn(2);
    }
}
