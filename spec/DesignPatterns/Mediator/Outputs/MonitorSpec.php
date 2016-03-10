<?php

namespace spec\DesignPatterns\Mediator\Outputs;

use DesignPatterns\Mediator\Outputs\Output;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MonitorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedLabeled('vox');
    }

    function it_has_a_label()
    {
        $this->label()->shouldReturn('vox');
    }

    function it_is_an_output()
    {
        $this->shouldImplement(Output::class);
    }

    function it_can_be_labeled()
    {
        $this->label('BVs');
        $this->label()->shouldBe('BVs');
    }
}
