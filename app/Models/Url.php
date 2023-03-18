<?php

namespace App\Models;

use Hidehalo\Nanoid\Client as Nanoid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Url extends Model
{
    use Notifiable;

    protected $fillable = [
        'url',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->uid = (new Nanoid)->generateId($size = 10);
    }

    public function shortUrl()
    {
        return url("/{$this->uid}");
    }
}
