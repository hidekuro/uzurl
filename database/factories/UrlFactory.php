<?php

namespace Database\Factories;

use App\Models\Url;
use Hidehalo\Nanoid\Client as NanoidClient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    protected $model = Url::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => app()->make(NanoidClient::class)->generateId(),
            'url' => fake()->url(),
        ];
    }
}
