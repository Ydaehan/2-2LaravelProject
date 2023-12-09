<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'content' => Str::random(300),
                'user_id' => 'test1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::table('posts')->insert([
            'title' => '나도 사실 개발자미래가 걱정되긴함',
            'content' => '인공지능이됐던 뭐가됐던 앞으로 개발자들의 생산성이 엄청 향상되는건 부정할 수 없잖음 이렇게 된다고할때 개발자 수요가 지금처럼 이어질까? 라는생각을 해보면 아닐거같음 과거를 생각해보면 개발자의 생산성이 커짐에따라 전체적인 시장파이도 같이커졌음 예를들어 2000년대초 개발자들이랑 지금 개발자들의 생산성을 비교하면 지금이 압도적임 거의 과거엔 개발자 3명이상이 하던걸 혼자하는수준 하지만 지금은? 개발자들의 생산성이 엄청나게 높아지는건 부정할 수 없는 미래인데 그때도 시장파이가 더 늘어나고 개발자 수요가 유지되는게 가능할까..?',
            'user_id' => 'ydhtester',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
