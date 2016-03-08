<?php

namespace DesignPatterns\ChainOfResponsibility;

abstract class BaseHandler implements Handler
{
    /**
     * @var Handler
     */
    protected $nextHandler;

    /**
     * @param Handler $nextHandler
     */
    public function __construct(Handler $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    /**
     * @param Command $command
     */
    public function handle(Command $command)
    {
        $this->nextHandler->handle($command);
    }
}
