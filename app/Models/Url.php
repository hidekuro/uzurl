<?php

namespace App\Models;

use Database\Factories\UrlFactory;
use Hidehalo\Nanoid\Client as NanoidClient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

class Url extends Model
{
    use Notifiable;
    use HasFactory;

    /**
     * UIDの長さ
     *
     * @var int
     */
    const UID_LENGTH = 10;

    protected $fillable = [
        'url',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->uid = App::make(NanoidClient::class)->generateId();
    }

    protected static function newFactory(): Factory
    {
        return UrlFactory::new();
    }

    public function shortUrl()
    {
        return url("/{$this->uid}");
    }
}
