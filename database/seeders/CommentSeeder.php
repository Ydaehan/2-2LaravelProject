<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            DB::table('comments')->insert([
                'content' => Str::random(10),
                'user_id' => 'test2',
                'post_id' => Post::pluck('id')->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
