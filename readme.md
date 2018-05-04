# Example of how to implement the GPIO Manager

## GPIO Manager
### requirements 
The GPIO Manager package requires that you install the `gpio` command.

```bash
apt-get install gpio
```
> GPIO Manager in laravel also uses the cache facade and requires a cache driver to be installed

## Using GPIO Manager with laravel 

Install the package

```bash
Add cool composer install with packagist here
```

Require the service provider into your application config file in `config/app.php`.

```php
'providers' => [
    ...
    
    \ChickenTikkaMasala\GPIO\Bridge\Laravel\GPIOServiceProvider::class,
    
    ...
    
];
```
Add the event service provider
```php
protected $subscribe = [
    \ChickenTikkaMasala\GPIO\Bridge\Laravel\Events\EventSubscriber::class,
 ];
 ```

Get the vendor config files by running 

```bash 
php artisan vendor:publish --provider="ChickenTikkaMasala\GPIO\Bridge\Laravel\GPIOServiceProvider"
```

Configure your environment within the config file provided in `config/gipo.php`.

Use the command below to see your environment 
```bash
php artisan gpio:list
```
### Integration and use
Now we've setup the environment there are many possible ways of implementing connections with the GPIOManager. 
The most common method of integration is to require the GPIOManager class into your Controller for http request.

See app/Http/Controllers/GPIOManagerExampleController.php

### Other possible methods

- Create a job queue and log a response from a particular sensor every interval and log in a database the value.
- Set up commands and interact with the commands you've created.
- Use a web socket to controller your device and receive data responses back for building graphs and or response to actions. (using react with electron could be a great visual aid).
