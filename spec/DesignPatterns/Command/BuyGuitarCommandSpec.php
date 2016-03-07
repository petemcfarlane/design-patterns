<?php

namespace spec\DesignPatterns\Command;

use DesignPatterns\Command\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuyGuitarCommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('fender');
    }

    function it_is_a_command()
    {
        $this->shouldImplement(Command::class);
    }

    function it_has_a_brand()
    {
        $this->brand()->shouldReturn('fender');
    }
}
