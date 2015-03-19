<?php

namespace SIAPI\Component;

final class Application
{
    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getConfig($key)
    {
        return (array_key_exists($key, $this->config)) ? $this->config[$key] : null;
    }
}
