<?php

namespace DesignPatterns\ChainOfResponsibility;

class EmailCommand implements Command
{
    public function send()
    {
        // send email logic
    }

    public function __toString()
    {
        return 'email command';
    }
}
