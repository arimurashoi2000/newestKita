<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ArticleComment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleComment>
 */
class ArticleCommentFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ArticleComment::class;

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
