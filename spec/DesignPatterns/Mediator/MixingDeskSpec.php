<?php

namespace spec\DesignPatterns\Mediator;

use DesignPatterns\Mediator\Channel;
use DesignPatterns\Mediator\Outputs\Speakers;
use DesignPatterns\Mediator\Instruments\Instrument;
use DesignPatterns\Mediator\MixingDesk;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Outputs\Output;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MixingDeskSpec extends ObjectBehavior
{
    function let(Speakers $frontOfHouse, Monitor $monitor1, Monitor $monitor2, Monitor $monitor3, Monitor $monitor4)
    {
        $monitor3->label()->willReturn('drums');

        $this->beConstructedWith($frontOfHouse, $monitor1, $monitor2, $monitor3, $monitor4);
    }

    function it_has_8_channels()
    {
        $channels = $this->channels();
        $channels->shouldHaveCount(8);
        $channels[0]->shouldHaveType(Channel::class);
    }

    function it_has_a_front_of_house_output()
    {
        $this->output()->shouldHaveType(Speakers::class);
    }

    function it_has_4_monitor_mixes()
    {
        $this->monitor1()->shouldHaveType(Output::class);
        $this->monitor2()->shouldHaveType(Output::class);
        $this->monitor3()->shouldHaveType(Output::class);
        $this->monitor4()->shouldHaveType(Output::class);
    }

    function it_can_plugin_an_input_source_to_a_channel(Instrument $input)
    {
        $this->pluginInputToChannelNumbered($input, Channel::labeled('1'));
    }

    function it_can_plugin_an_input_to_the_next_available_channel(Instrument $input)
    {
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->pluginNextAvailableChannel($input);
        $this->shouldThrow(new \DomainException('No free channels'))->during('pluginNextAvailableChannel', [$input]);
    }

    function it_can_plugin_the_next_available_channel_and_label_it(Instrument $input)
    {
        $this->pluginNextAvailableChannelAndLabel($input, 'strings');
        $this->channels()[0]->label()->shouldBe('strings');
    }

    function it_can_label_a_channel()
    {
        $this->labelChannel(Channel::labeled('5'), 'sax');
    }

    function it_can_change_the_level_of_a_channel()
    {
        $this->labelChannel(Channel::labeled('7'), 'guitar');
        $this->adjustLevelOfChannel(Channel::labeled('guitar'), -9);
    }

    function it_can_adjust_the_level_of_a_channel_sent_to_a_monitor_mix()
    {
        $this->labelChannel(Channel::labeled('3'), 'vocals');
        $this->adjustMonitorSendForChannel(Channel::labeled('vocals'), Monitor::labeled('drums'), +12);
    }

    function it_can_adjust_the_front_of_house_level()
    {
        $this->masterLevel()->shouldBe(0.0);
        $this->adjustMasterLevel(-20);
        $this->masterLevel()->shouldBe(-20.0
        );
    }
}
