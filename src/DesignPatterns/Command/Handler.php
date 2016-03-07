<?php

namespace DesignPatterns\Command;

interface Handler
{
    function handle(Command $command);
}
