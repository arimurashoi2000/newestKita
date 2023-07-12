<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article_comment;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Article_commentデータの生成と挿入
        Article_comment::factory()->count(30)->create();
    }
}
