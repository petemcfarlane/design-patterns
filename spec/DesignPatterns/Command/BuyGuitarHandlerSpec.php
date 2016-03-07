<?php

namespace spec\DesignPatterns\Command;

use DesignPatterns\Command\BuyGuitarCommand;
use DesignPatterns\Command\Handler;
use DesignPatterns\Flyweight\FenderGuitar;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuyGuitarHandlerSpec extends ObjectBehavior
{
    function it_is_a_handler()
    {
        $this->shouldImplement(Handler::class);
    }

    function it_handles_a_BuyGuitarCommand_and_returns_a_corresponding_guitar(BuyGuitarCommand $command)
    {
        $command->exec()->willReturn(new FenderGuitar());
        $this->handle($command)->shouldHaveType(FenderGuitar::class);
    }
}
