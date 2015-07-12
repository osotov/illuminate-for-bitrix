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
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $capsule;

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
        $this->capsule = new \Illuminate\Database\Capsule\Manager($this->container);
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

    /**
     * @param array $credentials
     */
    public function addDbConnection($credentials = [])
    {
        if (empty($credentials)) {
            $bitrixDbCredentials = \Bitrix\Main\Application::getInstance()
                ->getConnection()->getConfiguration();
            $credentials = [
                'driver' => 'mysql',
                'database' => $bitrixDbCredentials['database'],
                'username' => $bitrixDbCredentials['login'],
                'password' => $bitrixDbCredentials['password'],
                'host' => $bitrixDbCredentials['host'],
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => false,
            ];
        }
        $this->capsule->addConnection($credentials);

        $this->capsule->setAsGlobal();

        $this->capsule->bootEloquent();
    }
}
