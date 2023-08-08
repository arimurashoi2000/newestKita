<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Article_tag;

class ArticleSeeder extends Seeder
{
    /**
     * 記事シーダーを実行
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Article_tag::all();
        Article::factory()->count(40)
            ->create()
            ->each(function ($article) use ($tags) {
                $article->tags()->attach($tags->random(3));
            });
    }
}
