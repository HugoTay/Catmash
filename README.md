# Catmash


## Introduction
Catmash is a based on Facemash (project made by Facebook founder). This project responds to a job admission for L'Atelier.

It is created with SlimFramework (micro php framework).

## Prerequisites

Make sure to have few components to make it works.
* php
* MySQL (Apache not needed, Slim has internal router)
* Composer
*

## Getting started

To make it works, you have to modify a few things.

First of all, you have to change the configuration settings to access to the database in **app/settings.php**. 
Set your own informations instead.

### App/Settings.php
`        
        'db' => [
            'driver'    => 'mysql',
            'host'      => <your_host>,
            'database'  => <your_database>,
            'username'  => '<mysql_username>',
            'password'  => '<mysql_password>',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
`
### Launch the server

To run the server, launch terminal at the project **root path** and run next command line 
            **php -S localhost:8080 -t public/ -ddiplay_errors=1 -dzned_extension=xdebug.so**
