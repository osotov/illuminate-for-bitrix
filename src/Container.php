<?php

namespace Osotov\IlluminateForBitrix;

/**
 * Class Container
 * @package Osotov\IlluminateForBitrix
 */
class Container
{
    protected static $container;

    public static function getContainer()
    {
        if (! self::$container) {
            self::$container = new \Illuminate\Container\Container();
            self::$container->bind('app', self::$container);
        }
        return self::$container;
    }
}
