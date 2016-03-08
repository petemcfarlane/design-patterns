<?php

namespace DesignPatterns\ChainOfResponsibility;

class EmailHandler extends BaseHandler implements Handler
{
    public function handle(Command $command)
    {
        if ($command instanceof EmailCommand) {
            $command->send();
        } else {
            parent::handle($command);
        }
    }
}
