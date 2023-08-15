<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ArticleTag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\l>
 */
class ArticleTagFactory extends Factory
{

    /**
     * @var string
     */
    protected $model = ArticleTag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->realText(15),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
