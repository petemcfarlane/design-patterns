<?php

namespace DesignPatterns\Command;

use DesignPatterns\Flyweight\FenderGuitar;
use DesignPatterns\Flyweight\GibsonGuitar;

class BuyGuitarCommand implements Command
{
    /**
     * @var string
     */
    private $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    public function brand()
    {
        return $this->brand;
    }

    public function exec()
    {
        if ($this->brand() == 'fender') {
            return new FenderGuitar();
        }

        if ($this->brand() == 'gibson') {
            return new GibsonGuitar();
        }
    }
}
