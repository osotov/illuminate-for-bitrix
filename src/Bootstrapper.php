<?php

namespace Osotov\IlluminateForBitrix;

/**
 * Class Bootstrapper
 * @package Osotov\IlluminateForBitrix
 */
class Bootstrapper
{
    /**
     * @var \Illuminate\Container\Container
     */
    protected $container;
    /**
     * @var ServiceProviders\ServiceProvider
     */
    protected $defaultServiceProvider;

    /**
     *
     */
    public function bootstrap()
    {
        $this->container = Container::getContainer();
        $this->defaultServiceProvider = $this->container->make(
            'Osotov\IlluminateForBitrix\ServiceProviders\DefaultServiceProvider',
            [$this->container]
        );
    }

    /**
     * @param ServiceProviders\ServiceProvider $serviceProvider
     */
    public function registerServiceProviders(ServiceProviders\ServiceProvider $serviceProvider = null)
    {
        if (! $serviceProvider) {
            $serviceProvider = $this->defaultServiceProvider;
        }
        $serviceProvider->register();
    }
}
