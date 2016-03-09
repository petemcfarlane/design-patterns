<?php

namespace spec\DesignPatterns\Interpreter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DurationSpec extends ObjectBehavior
{
    function it_can_be_a_semibreve()
    {
        $this->beConstructedThrough('semibreve');
        $this->duration()->shouldEqual(1.0);
    }

    function it_can_be_a_minim()
    {
        $this->beConstructedThrough('minim');
        $this->duration()->shouldEqual(0.5);
    }

    function it_can_be_a_crochet()
    {
        $this->beConstructedThrough('crotchet');
        $this->duration()->shouldEqual(0.25);
    }
}
