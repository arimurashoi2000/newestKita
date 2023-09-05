<?php

namespace Database\Seeders;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * memberシーダーを実行
     * @return void
     */
    public function run()
    {
        Member::create([
            'id' => '1',
            'name' => '鈴木拓',
            'email' => 'suzuki@gmail.com',
            'password' =>  Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Member::factory()->count(20)->create();
    }
}
