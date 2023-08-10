<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article_tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Article_tagFactory extends Factory
{

    /**
     * @var string
     */
    protected $model = Article_tag::class;

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
