<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;
use App\Models\Article_tag;
class ArticleSeeder extends Seeder
{
    /**
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
