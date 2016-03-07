<?php

namespace DesignPatterns\Flyweight;

class GuitarFactory
{
    /**
     * @var Guitar[]
     */
    private $guitars = [];

    public function makeGuitar($brand)
    {
        if ($brand == 'gibson') {
            return $this->makeGibsonGuitar();
        }

        if ($brand == 'fender') {
            return $this->makeFenderGuitar();
        }
    }

    /**
     * @return GibsonGuitar
     */
    private function makeGibsonGuitar()
    {
        if (!array_key_exists('gibson', $this->guitars)) {
            $this->guitars['gibson'] = new GibsonGuitar();
        }

        return $this->guitars['gibson'];
    }

    /**
     * @return FenderGuitar
     */
    private function makeFenderGuitar()
    {
        if (!array_key_exists('fender', $this->guitars)) {
            $this->guitars['fender'] = new FenderGuitar();
        }

        return $this->guitars['fender'];
    }
}
