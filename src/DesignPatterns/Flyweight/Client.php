<?php

namespace DesignPatterns\Flyweight;

class Client
{
    /**
     * @var GuitarFactory
     */
    private $guitarFactory;

    public function __construct(GuitarFactory $guitarFactory)
    {
        $this->guitarFactory = $guitarFactory;
    }

    public function getGuitar($brand)
    {
        return $this->guitarFactory->makeGuitar($brand);
    }
}
