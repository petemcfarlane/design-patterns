<?php

namespace spec\DesignPatterns\State;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PresetSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Artist Name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DesignPatterns\State\Preset');
    }
}
