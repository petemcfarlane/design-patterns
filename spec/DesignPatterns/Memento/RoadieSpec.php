<?php

namespace spec\DesignPatterns\Memento;

use DesignPatterns\Memento\GuitarAmplifier;
use DesignPatterns\Memento\Preset;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoadieSpec extends ObjectBehavior
{
    function let(GuitarAmplifier $amplifier)
    {
        $this->beConstructedWith($amplifier);
    }

    function it_can_remember_the_current_amp_settings_by_name(GuitarAmplifier $amplifier)
    {
        $this->remember('metal');
        $amplifier->savePreset()->shouldHaveBeenCalled();
    }

    function it_can_recall_a_preset_by_name(GuitarAmplifier $amplifier, Preset $bluesPreset)
    {
        $amplifier->savePreset()->willReturn($bluesPreset);
        $this->remember('blues'); // must first remember a settings

        $amplifier->fromPreset($bluesPreset)->shouldBeCalled();

        $this->recall('blues');
    }
}
