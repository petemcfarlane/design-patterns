<?php

namespace DesignPatterns\ChainOfResponsibility;

class LogHandler extends BaseHandler implements Handler
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger, Handler $nextHandler)
    {
        $this->logger = $logger;
        parent::__construct($nextHandler);
    }

    public function handle(Command $command)
    {
        $this->logger->log($command->__toString());
        parent::handle($command);
    }
}
