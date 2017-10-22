<?php

namespace App\Controllers;
use App\Models\Cats;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Database\Capsule\Manager as DB;

class PagesController extends Controller {

	public function home(RequestInterface $request, ResponseInterface $response) {
		$this->render($response, 'home.twig');
	}

	public function getfacemash(RequestInterface $request, ResponseInterface $response) {

		$this->data->createCats();

		$cats = $this->data->getCats();
		$all = $this->data->getAllCats();
		$columns = DB::getSchemaBuilder()->getColumnListing((new Cats)->getTable());
		$data = ["cats" => $cats, "all" => $all, "columns" => $columns];

		$this->render($response, 'facemash.twig', $data);
	}

	public function postfacemash(RequestInterface $request, ResponseInterface $response) {

		$id = $request->getParam('catId');

		$id = intval(substr($id, -1)) - 1;

		$this->data->updateValues($id);
		$this->data->createCats();
	}

	public function getScores(RequestInterface $request, ResponseInterface $response) {

		$all = $this->data->getAllCats();
		$this->render($response, 'scores.twig', ['all' => $all]);
	}
}
