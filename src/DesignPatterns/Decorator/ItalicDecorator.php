<?php

namespace DesignPatterns\Decorator;

use DesignPatterns\Decorator\DocumentInterface;

class ItalicDecorator implements DocumentInterface
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
        return sprintf('<i>%s</i>', $this->document->title());
    }

    /**
     * @return string
     */
    public function body()
    {
        return $this->document->body();
    }
}
