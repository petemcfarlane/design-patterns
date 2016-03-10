<?php

namespace spec\DesignPatterns\Mediator\Requests;

use DesignPatterns\Mediator\Requests\Request;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TurnUpInMyMonitorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('channel', ['sax']);
    }

    function it_is_a_request()
    {
        $this->shouldImplement(Request::class);
    }

    function it_has_a_label()
    {
        $this->label()->shouldReturn('sax');
    }
}
