<?php

namespace DesignPatterns\Decorator;

interface DocumentInterface
{
    /**
     * @return string
     */
    public function title();

    /**
     * @return string
     */
    public function body();
}
