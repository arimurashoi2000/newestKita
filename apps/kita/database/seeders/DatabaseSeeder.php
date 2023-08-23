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
        // \App\Models\User::factory(10)->create();

        $this->call([MemberSeeder::class]);
        $this->call([ArticleTagSeeder::class]);
        $this->call([ArticleSeeder::class]);
        $this->call([AdminUserSeeder::class]);
        $this->call([ArticleCommentSeeder::class]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
