<?php
namespace App;

use App\Models\Cats;

class Database {

    /** @var \Slim\Container */
    private $container;

    public function __construct(\Slim\Container $container) {
        $this->container = $container;
    }

    public function catNotExists($cat){

        $url = $cat->path;
        $file_headers = @get_headers($url);
        return $file_headers[0] == 'HTTP/1.1 404 Not Found';
    }

    public function saveCats(array $data){

        $_SESSION['cats'] = $data;
    }

    public function isDefined(){
        return isset($_SESSION['cats']);
    }

    public function unsetCats(){
        unset($_SESSION['cats']);
    }

    public function createCat($score = 0){
        $marge = 40;
        if (!$score)
            $cat = Cats::inRandomOrder()->first();
        else
            $cat = Cats::inRandomOrder()->where('score', '>=', $score - $marge)
                        ->where('score', '<=', $score + $marge)
                        ->first();
        return $cat;
    }

    public function createCats(){

        $data = [];
        if ($this->isDefined())
            $this->unsetCats();
        array_push($data,$this->createCat());
        do{
            array_push($data,$this->createCat($data[0]['score']));
        }while($data[0].["path"] == $data[1].["path"]);
        $this->saveCats($data);
    }

    public function getCoef($elo){

        if ($elo < 2000){
            return 32;
        }
        else if ($elo < 2400){
            return 24;
        }
        return 16;
    }
    public function updateValues($id_win){

        $max = 2;
        $array = $_SESSION['cats'];

        for($i = 0; $i < $max; $i++){
            $cat = $array[$i];
            $elo = $cat["score"];
            $est = 1 / (1 + (pow(10, ($array[$max - 1 - $i]["score"] - $cat["score"])/400)));
            $new_elo = $elo + $this->getCoef($elo) * (($id_win === $i) ? 1 : 0) - $est;
            $update = Cats::where("id", $cat["id"])
                        ->update(['score'=> $new_elo]);
        }
        $this->saveCats($array);
    }
    public function getCat($id){

        return $id ? $_SESSION['cats'][1] : $_SESSION['cats'][0];
    }

    public function getCats(){
        return $_SESSION['cats'];
    }

    public function getAllCats(){
        return Cats::orderBy('score', 'desc')->get();
    }
}
