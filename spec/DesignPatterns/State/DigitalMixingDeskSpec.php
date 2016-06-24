<?php

namespace spec\DesignPatterns\State;

use DesignPatterns\State\Preset;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DigitalMixingDeskSpec extends ObjectBehavior
{
    function it_can_load_a_preset_configuration_for_a_given_band(Preset $preset)
    {
        $this->loadPreset($preset);
    }

    function it_can_save_the_current_configuration_as_a_preset()
    {
        $this->saveAs('beatles');
    }
}
