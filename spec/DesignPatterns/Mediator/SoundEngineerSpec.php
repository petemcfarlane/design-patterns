<?php

namespace spec\DesignPatterns\Mediator;

use DesignPatterns\Mediator\Channel;
use DesignPatterns\Mediator\Instruments\Instrument;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\MixingDesk;
use DesignPatterns\Mediator\Musicians\Musician;
use DesignPatterns\Mediator\Requests\Request;
use DesignPatterns\Mediator\Requests\TurnDownInMyMonitor;
use DesignPatterns\Mediator\Requests\TurnUpInMyMonitor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SoundEngineerSpec extends ObjectBehavior
{
    function let(MixingDesk $mixingDesk)
    {
        $this->beConstructedWith($mixingDesk);
    }

    function it_can_plugin_a_musician(Musician $musician, MixingDesk $mixingDesk, Instrument $input)
    {
        $musician->instrument()->willReturn($input);
        $musician->name()->willReturn('piano');

        $this->plugin($musician);

        $mixingDesk->pluginNextAvailableChannelAndLabel($input, 'piano')->shouldHaveBeenCalled();
    }

    function it_can_adjust_the_level_of_a_channel(MixingDesk $mixingDesk, Channel $channel)
    {
        $this->adjustLevelOfChannel($channel, +3);

        $mixingDesk->adjustLevelOfChannel($channel, +3)->shouldHaveBeenCalled();
    }

    function it_can_adjust_the_master_level(MixingDesk $mixingDesk)
    {
        $this->adjustMasterLevel(-5);

        $mixingDesk->adjustMasterLevel(-5)->shouldHaveBeenCalled();
    }

    function it_can_respond_to_a_musicians_request(Musician $musician, Request $request)
    {
        $this->respondTo($musician, $request);
    }

    function it_can_turn_down_a_channel_in_a_musicians_monitor(Musician $musician, MixingDesk $mixingDesk)
    {
        $musician->monitor()->willReturn(Monitor::labeled('drums'));

        $this->respondTo($musician, TurnDownInMyMonitor::channel('vocals'));

        $mixingDesk->adjustMonitorSendForChannel(Channel::labeled('vocals'), Monitor::labeled('drums'), -6)->shouldHaveBeenCalled();
    }

    function it_can_turn_up_a_channel_in_a_musicians_monitor(Musician $musician, MixingDesk $mixingDesk)
    {
        $musician->monitor()->willReturn(Monitor::labeled('wind'));

        $this->respondTo($musician, TurnUpInMyMonitor::channel('strings'));

        $mixingDesk->adjustMonitorSendForChannel(Channel::labeled('strings'), Monitor::labeled('wind'), +6)->shouldHaveBeenCalled();
    }
}
