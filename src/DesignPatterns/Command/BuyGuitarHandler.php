<?php

namespace DesignPatterns\Command;

class BuyGuitarHandler implements Handler
{
    function handle(Command $command)
    {
        if (!$command instanceof BuyGuitarCommand) {
            return; // ignore other types of command
        }

        return $command->exec();
    }
}
