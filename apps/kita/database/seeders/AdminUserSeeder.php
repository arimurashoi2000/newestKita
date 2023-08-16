<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     *データベースに記事と関連するタグを挿入
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'last_name' => '鈴木',
            'first_name' => '拓',
            'email' => 'suzuki@gmail.com',
            'password' =>  Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AdminUser::factory()->count(20)->create();
    }
}
