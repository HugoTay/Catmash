# Catmash


## Introduction
Catmash is a based on Facemash (project made by Facebook founder). This project responds to a job admission for L'Atelier.

It is created with SlimFramework (micro php framework)
MySQL Database running in back-end.

## Getting started

To make it works, you have to modify a few things.

First of all, you have to change the configuration settings to access to the database in **app/settings.php**. 
Set your own informations instead.

### App/Settings.php
`        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'facemash',
            'username'  => 'root',
            'password'  => 'hugoserver',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
`
