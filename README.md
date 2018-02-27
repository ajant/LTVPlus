# Backend Developer – Assignment

Since not all locations provided in the assignment were required to demonstrate the application, only first 4 were converted, using [this app](http://www.earthpoint.us/StatePlane.aspx).
There are two solutions of the Assignment.

# Solution based on HTML, JavaScript & CSS

### Prerequisites

No Prerequisites

### Installing

No Installation required

### Run

Load [app_root]/simple/index.html page in the browser 

# Solution based on PHP, HTML, JavaScript & CSS

### Prerequisites

List of tools for development environment setup in which the app was tested:

```bash
- Docker
```

Links are available in [Built With](#built-with) section below.

### Installing

A step by step series of examples that tell you how to get a development environment running:

From [app_root] directory run machine setup and provisioning

```bash
docker-compose up
```

Edit your local hosts file (in *nix systems location is usually /etc/hosts) and add following line 

```bash
127.0.0.1 ltvplus.local
```

Login into development container

```bash
docker exec -it ltvplus bash
```

Navigate to [app_root] inside container

```bash
cd /var/www/html
```

Install dependencies

```bash
composer install
```

### Run

Navigate to [this url](http://ltvplus.local/demonstration) 

### API Documentation

Navigate to [this url](http://ltvplus.local/documentation)

### Running the tests

In order to run Integration tests invoke following steps.

Start development machine from [app_root] directory if not already running

```bash
docker-compose up
```

Login into development container

```bash
docker exec -it ltvplus bash
```

Navigate to [app_root] inside container

```bash
cd /var/www/html
```

Run Integration tests

```bash
vendor/bin/phpunit -c test/Integration/phpunit.xml test/Integration/
```

### Coding quality tests

For code quality PHP CodeSniffer and PHP MessDetector were used.

To run PHP CodeSniffer follow the same steps as with Integration tests except tha last one which is:

```bash
vendor/bin/phpcs -s --standard=PSR2 src/
```

To run PHP MessDetector follow the same steps as with Unit tests except tha last one which is:

```bash
vendor/bin/phpmd src/ text code-inspections/phpmd-config.xml
```

After running the command, all potential code smells should be displayed (if no output is shown after running the commands, code is passing all checks)

## Built With

* [Debian GNU/Linux 8 (jessie)](https://www.debian.org/) - 
Popular linux distribution
* [Docker version 17.12.0-ce](https://www.docker.com/) - 
Docker is a container technology for Linux
* [PHP 7.1](http://php.net/) - 
Popular web programming language 
* [Composer 1.6.3](https://getcomposer.org/) - 
Dependency Manager for PHP
* [Silex 2.0](https://silex.symfony.com/) - 
PHP micro-framework based on the Symfony Components
* [PHPUnit 6.5.6](https://phpunit.de/) - 
Unit testing framework for the PHP
* [PHP CodeSniffer 3.2.3](https://github.com/squizlabs/PHP_CodeSniffer) - 
Tool for detecting violations of a defined set of coding standards
* [PHP MessDetector 2.6.0](https://phpmd.org/) - 
Tool for detecting possible bugs, suboptimal code, overcomplicated expressions and unused parameters, methods, properties
* [Apache 2.4.10](https://www.apache.org/) - 
HTTP Web server
* [Aglio/Apiary 2.3.0](https://github.com/danielgtaylor/aglio) - 
An API Blueprint renderer

## Versioning

[SemVer](http://semver.org/) is used for versioning. 
For the versions available, see the [tags on this repository](https://github.com/ajant/LTVPlus). 

## Authors

* **Aleksandar Jovanovic**