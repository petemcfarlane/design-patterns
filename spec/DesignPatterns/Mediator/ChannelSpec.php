<?php

namespace spec\DesignPatterns\Mediator;

use DesignPatterns\Mediator\Instruments\Instrument;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChannelSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedLabeled('1');
    }

    function it_has_a_label()
    {
        $this->label()->shouldBeLike('1');
    }

    function it_can_be_relabeled()
    {
        $this->relabel('vox');
        $this->label()->shouldBe('vox');
    }

    function it_can_plugin_an_input(Instrument $input)
    {
        $this->plugIn($input);

        $this->input()->shouldBe($input);
    }

    function it_can_adjust_the_level()
    {
        $this->level()->shouldBe(0.0);
        $this->adjustLevel(-3);
        $this->level()->shouldBe(-3.0);
    }

    function it_can_adjust_the_level_sent_to_a_given_monitor_mix()
    {
        $this->monitorSendLevel(1)->shouldBe(-127.0);
        $this->adjustMonitorSend(1, +127);
        $this->monitorSendLevel(1)->shouldBe(0.0);
    }
}
