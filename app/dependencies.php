<?php

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function (\Slim\Container $container) use ($capsule) {
    return $capsule;
};

$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

$container['data'] = function (\Slim\Container $container) {

    return new \App\Database($container);
};

$container['view'] = function ($container) {

	$dir = dirname(__DIR__);

    //On dit où sont situés les templates
    $view = new \Slim\Views\Twig($container->get('settings')['views']['view_path'], [
        'cache' => ((!$container->get('settings')['debug']) ? dirname(__DIR__).'/tmp/cache' : false),
        'debug' => $container->get('settings')['debug']
    ]);

    // Si on est en mode DEBUG : on affiche les erreurs de rendu Twig
    if ($container->get('settings')['debug']) {
        $view->addExtension(new Twig_Extension_Debug());
    }

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};
