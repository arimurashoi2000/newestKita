<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    /**
     * 記事データの設定
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->realText(15),
            'contents' => $this->faker->realText(500),
            'created_at' => now(),
            'updated_at' => now(),
            'member_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
