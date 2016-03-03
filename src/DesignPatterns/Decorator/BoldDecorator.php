<?php

namespace DesignPatterns\Decorator;

class BoldDecorator implements DocumentInterface
{
    /**
     * @var DocumentInterface
     */
    private $document;

    /**
     * @param DocumentInterface $document
     */
    public function __construct(DocumentInterface $document)
    {
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function title()
    {
        return sprintf('<b>%s</b>', $this->document->title());
    }

    /**
     * @return string
     */
    public function body()
    {
        return $this->document->body();
    }
}
