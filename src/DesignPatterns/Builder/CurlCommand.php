<?php

namespace DesignPatterns\Builder;

class CurlCommand
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $options;

    /**
     * @param $url
     * @param array $options
     */
    public function __construct($url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function options()
    {
        return $this->options;
    }
}
