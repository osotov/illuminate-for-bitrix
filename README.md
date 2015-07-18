# illuminate-for-bitrix

Adaptation of some Illuminate components for usage inside 1C-Bitrix framework

## note

This package requires latest versions of php (>= 5.5.9).

## installation

To install package, run the command below and you will get the latest
version

```sh
composer require osotov/illuminate-for-bitrix
```

## usage

Include Composer autoloader (/vendor/autoload.php) inside init.php file.

Instantiate bootstrapper class and use bootstrap method to initialize container.
 
```php
$bootstrapper = new \Osotov\IlluminateForBitrix\Bootstrapper();
$bootstrapper->bootstrap();
```
 
 Now you are able to get container instance from any code executed after init.php.
 
```php
$container = \Osotov\IlluminateForBitrix\Container::getContainer();
```
 
 If you want to register service provider class pass its instance to registerServiceProviders method.
 
```php
$serviceProvider = new MyServiceProvider();
$bootstrapper->registerServiceProviders($serviceProvider);
```
 
 If you want to use Eloquent use addDbConnection method. By default it uses Bitrix connection credentials. If you want to use different connection pass array with credentials as argument.
 
 ```php
 $bootstrapper->addDbConnection();
 ```