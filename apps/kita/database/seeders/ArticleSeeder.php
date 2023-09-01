<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleTag;

class ArticleSeeder extends Seeder
{
    /**
     *データベースに記事と関連するタグを挿入
     * @return void
     */
    public function run()
    {
        $tags = ArticleTag::all();

        // member_id が 1 の記事を 20 個作成
        Article::factory()->count(20)->create([
            'member_id' => 1,
        ])->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(3));
        });

        Article::factory()->count(40)
            ->create()
            ->each(function ($article) use ($tags) {
                $article->tags()->attach($tags->random(3));
            });
    }
}
