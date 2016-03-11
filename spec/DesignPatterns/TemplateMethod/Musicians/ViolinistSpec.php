<?php

namespace spec\DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Violin;
use DesignPatterns\TemplateMethod\Musicians\Musician;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ViolinistSpec extends ObjectBehavior
{
    function let(Violin $violin)
    {
        $this->beConstructedWith($violin);
    }
    function it_is_a_musician()
    {
        $this->shouldHaveType(Musician::class);
    }

    function it_has_a_violin()
    {
        $this->instrument()->shouldHaveType(Violin::class);
    }

    function it_can_bow_its_violin(Violin $violin)
    {
        $this->play();
        $violin->bow()->shouldHaveBeenCalled();
    }
}
