<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

class Controller {

	private $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function render(ResponseInterface $response, $file, $params = []) {
		$this->container->view->render($response, $file, $params);
	}

	public function redirect(ResponseInterface $response, $name, array $data = []) {
		return $response->withStatus(302)->withHeader('Location', $this->router->pathFor($name, $data));
	}

	public function __get($name) {
		return $this->container->get($name);
	}
}
