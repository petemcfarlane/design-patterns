<?php

namespace spec\DesignPatterns\Memento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PresetSpec extends ObjectBehavior
{
    function let()
    {
        $settings = [
            'gain' => 5,
            'treble' => 5,
            'mid' => 5,
            'bass' => 5,
            'level' => 5,
        ];
        $this->beConstructedWith($settings);
    }

    function its_settings_can_be_accessed()
    {
        $this->getSettings()->shouldReturn([
            'gain' => 5,
            'treble' => 5,
            'mid' => 5,
            'bass' => 5,
            'level' => 5,
        ]);
    }
}
