<?php

namespace Osotov\IlluminateForBitrix\ServiceProviders;

use Illuminate\Container\Container;

/**
 * Class ServiceProvider
 * @package Osotov\IlluminateForBitrix\ServiceProviders
 */
abstract class ServiceProvider
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    abstract public function register();
}
