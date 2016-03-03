<?php

namespace DesignPatterns\Decorator;

class Document implements DocumentInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @param string $title
     * @param string $body
     */
    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function body()
    {
        return $this->body;
    }
}
