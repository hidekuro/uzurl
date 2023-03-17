<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Hidehalo\Nanoid\Client as Nanoid;

class Url extends Model
{
    protected $fillable = [
        'url',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->uid = (new Nanoid)->generateId($size = 10);
    }
}
