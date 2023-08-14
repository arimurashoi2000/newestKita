<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleComment;

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
        ArticleComment::factory()->count(30)->create();
    }
}
