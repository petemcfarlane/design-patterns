<?php

namespace DesignPatterns\Builder;

class CurlBuilder
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $options = [
        'method' => 'GET'
    ];

    private function __construct()
    {
    }

    /**
     * @param $url
     *
     * @return CurlBuilder
     */
    public static function withUrl($url)
    {
        $builder = new self;

        $builder->url = $url;

        return $builder;
    }

    /**
     * @param array $data
     *
     * @return CurlBuilder
     */
    public function withData($data = [])
    {
        $this->options['data'] = $data;

        return $this;
    }

    /**
     * @param $method
     *
     * @return CurlBuilder
     */
    public function withMethod($method)
    {
        $this->options['method'] = $method;

        return $this;
    }

    /**
     * @return CurlCommand
     */
    public function build()
    {
        return new CurlCommand($this->url, $this->options);
    }
}
