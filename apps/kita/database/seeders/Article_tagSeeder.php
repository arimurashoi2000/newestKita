<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article_tag;

class Article_tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Article_tag::factory()->count(40)->create();
    }
}
