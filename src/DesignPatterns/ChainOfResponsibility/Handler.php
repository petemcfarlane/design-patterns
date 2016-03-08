<?php

namespace DesignPatterns\ChainOfResponsibility;

interface Handler
{
    public function handle(Command $command);
}
