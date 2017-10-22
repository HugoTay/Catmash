<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model {

    protected $table = 'cats';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'path',
        'name',
        'tag',
        'score'
    ];
}
