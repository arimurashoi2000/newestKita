<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin_user;

class Admin_userSeeder extends Seeder
{
    /**
     *データベースに記事と関連するタグを挿入
     * @return void
     */
    public function run()
    {
        Admin_user::factory()->count(20)->create();
    }
}
