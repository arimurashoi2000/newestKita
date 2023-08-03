<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article_comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article_comment>
 */
class Article_commentFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Article_comment::class;

    /**
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'contents' => $this->faker->text(50),
            'member_id' => $this->faker->numberBetween(1, 10),
            'article_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
