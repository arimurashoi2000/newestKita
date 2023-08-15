<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     *データベースに記事と関連するタグを挿入
     * @return void
     */
    public function run()
    {
        AdminUser::factory()->count(20)->create();
    }
}
