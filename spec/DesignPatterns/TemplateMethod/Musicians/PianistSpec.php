<?php

namespace spec\DesignPatterns\TemplateMethod\Musicians;

use DesignPatterns\TemplateMethod\Instruments\Piano;
use DesignPatterns\TemplateMethod\Musicians\Musician;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PianistSpec extends ObjectBehavior
{
    function let(Piano $piano)
    {
        $this->beConstructedWith($piano);
    }

    function it_is_a_musician()
    {
        $this->shouldHaveType(Musician::class);
    }

    function it_can_play_the_piano(Piano $piano)
    {
        $this->play();
        $piano->play()->shouldHaveBeenCalled();
    }
}
