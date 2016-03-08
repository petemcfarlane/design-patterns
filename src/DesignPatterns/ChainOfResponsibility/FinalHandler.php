<?php

namespace DesignPatterns\ChainOfResponsibility;

class FinalHandler implements Handler
{
    public function handle(Command $command)
    {
        throw new \LogicException(sprintf('Unhandled Command: %s', $command->__toString()));
    }
}
