<?php

namespace spec\DesignPatterns\Facade;

use DesignPatterns\Facade\Pedals\CryBaby;
use DesignPatterns\Facade\Pedals\DelayPedal;
use DesignPatterns\Facade\Pedals\FuzzFace;
use DesignPatterns\Facade\Pedals\TubeScreamer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PedalBoardSpec extends ObjectBehavior
{
    function let(TubeScreamer $tubeScreamer, FuzzFace $fuzzFace, CryBaby $cryBaby, DelayPedal $delayPedal)
    {
        $this->beConstructedWith($tubeScreamer, $fuzzFace, $cryBaby, $delayPedal);
    }

    function it_has_a_chain_of_pedals()
    {
        $this->pedals()->shouldBeArray();
    }

    function it_has_a_rhythm_mode(TubeScreamer $tubeScreamer, FuzzFace $fuzzFace, CryBaby $cryBaby, DelayPedal $delayPedal)
    {
        $this->rhythmMode();
        $tubeScreamer->off()->shouldHaveBeenCalled();
        $fuzzFace->on()->shouldHaveBeenCalled();
        $cryBaby->off()->shouldHaveBeenCalled();
        $delayPedal->off()->shouldHaveBeenCalled();
    }

    function it_has_a_lead_mode(TubeScreamer $tubeScreamer, FuzzFace $fuzzFace, CryBaby $cryBaby, DelayPedal $delayPedal)
    {
        $this->leadMode();
        $tubeScreamer->on()->shouldHaveBeenCalled();
        $fuzzFace->off()->shouldHaveBeenCalled();
        $cryBaby->off()->shouldHaveBeenCalled();
        $delayPedal->on()->shouldHaveBeenCalled();
    }

    function it_has_a_wah_mode(TubeScreamer $tubeScreamer, FuzzFace $fuzzFace, CryBaby $cryBaby, DelayPedal $delayPedal)
    {
        $this->wahMode(8);
        $tubeScreamer->off()->shouldHaveBeenCalled();
        $fuzzFace->off()->shouldHaveBeenCalled();
        $cryBaby->on()->shouldHaveBeenCalled();
        $cryBaby->rock(8)->shouldHaveBeenCalled();
        $delayPedal->on()->shouldHaveBeenCalled();
    }
}
