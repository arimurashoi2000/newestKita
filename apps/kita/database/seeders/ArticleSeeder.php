<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

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
        Article::factory()->count(40)->create();
    }
}
