<?php

namespace DesignPatterns\Command;

class PlayGuitarHandler implements Handler
{
    function handle(Command $command)
    {
        if (!$command instanceof PlayGuitarCommand) {
            return; // ignore other commands
        }

        $command->exec();
    }
}
