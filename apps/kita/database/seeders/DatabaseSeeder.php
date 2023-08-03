<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Article_commentデータの生成と挿入
        $this->call([ArticleCommentSeeder::class]);
    }
}
