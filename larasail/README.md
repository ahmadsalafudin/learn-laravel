<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel Sail

How to start a project from scratch?
The only thing we need before we start, is to install Docker Desktop on our machine and, in case of Windows, use Windows Subsystem for Linux 2 (WSL2).

Then, from the terminal and in the directory where we want to download Laravel, we execute the following command naming the project.
## You can replace example-app with your app name
curl -s "https://laravel.build/example-app" | bash
This will download everything you need to set up our local development environment and start working with Laravel. At the end of the process, it will ask you for the sudo password to be able to configure the permissions of certain folders within the project.

As soon as the command finish, if we see the output, it tells us to enter to the directory and run the containers with:
cd example-app && ./vendor/bin/sail up
With this, the development environment is up and running. By default, we will have:

A container for the application itself with PHP 8 named with laravel.test.
Another for the database in MySQL although, there is an option to use Postgres.
A Redis container for the cache.
And finally, Selenium to run the Laravel Dusk browser tests in case we need it.
Before you start, configure the alias
Keep in mind that, since our project is now inside a Docker container, we have to execute all commands inside this container, which is where the expected PHP version is located among other things. It may seem complicated, but it's not.

The first thing we have to do, although it is optional, is to configure an alias to run, more quickly, the Sail executable.

What we will do is add, in the file .zshrc or .bashrc the following:
alias sail='bash vendor/bin/sail'
Once the alias is configured we can work with sail simply using sail, from the terminal, instead of ./vendor/bin/sail.

Start or stop the servers
To start the server we simply have to run sail up to see the output log in the foreground, or sail up -d to run it in the background in "daemon" mode.

When we want to stop the containers we will only have to write sail down. As you can see, they are exactly the same commands that we use with Docker. In fact, if you write you will simply sail be pitching docker ps. It's a simple way to work on a day-to-day basis and to get away from Docker a bit.

Running commands with artisan
When executing any command we are interested in doing it inside the container and for this, we must work with sail instead of using it directly artisan or php artisan as we usually do.
## Run migration locally
php artisan migrate

## Run migrations with Laravel Sail
sail artisan migrate
The same happens with PHP, Composer and Node / NPM
## Install Dusk, with Laravel Sail
sail composer require --dev laravel/dusk

## Print Laravel Sail PHP version
sail php --version

## Compile production assets with NPM in Laravel Sail
sail npm run prod
As you can see, it is usually prepared to work with any of these components as we usually do, with the only difference that we must add sail at the beginning.

Run unit tests
With Sail, we can run the PHPUnit unit tests without any problem from the first second. We will simply do:
sail test

## Same as
sail artisan test
Run navigation tests with Laravel Dusk
Running the navigation tests takes more configuration than the unit tests. In this case we need a Selenium container and the necessary Chrome drivers.

To achieve this we only have to uncomment the following block of the file docker-compose.yml:
selenium:
    image: 'selenium/standalone-chrome'
    volumes:
        - '/dev/shm:/dev/shm'
    networks:
        - sail
And add the Selenium dependency in the container laravel.test:
depends_on:
    - mysql
    - redis
    - selenium
With this, and obviously installing the library laravel/dusk, we will be able to launch the tests with sail dusk.

In this case, although it may seem the same, the command sail artisan dusk is not equivalent and would fail to execute.

Customize Laravel Dusk
Finally, you have to know that you can configure the containers as you want by publishing the configuration files.
sail artisan sail:publish
Remember that every change you make you will have to rebuild the containers with sail build --no-cache

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
