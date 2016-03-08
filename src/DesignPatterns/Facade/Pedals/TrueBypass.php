<?php

namespace DesignPatterns\Facade\Pedals;

interface TrueBypass
{
    /**
     * @return void
     */
    public function on();

    /**
     * @return void
     */
    public function off();

    /**
     * @return bool
     */
    public function isBypassed();
}
