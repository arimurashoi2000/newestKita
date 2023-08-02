<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * memberシーダーを実行
     * @return void
     */
    public function run()
    {
        Member::factory()->count(10)->create();
    }
}
