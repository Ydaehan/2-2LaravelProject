<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 'test1',
                'nickname' => 'test1',
                'password' => Hash::make('asdf1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'test2',
                'nickname' => 'test2',
                'password' => Hash::make('asdf1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'ydhtester',
                'nickname' => '유대한',
                'password' => Hash::make('asdf1234'),
                'created_at' => now(),
                'updated_at' => now(),    
            ]
        ];
        DB::table('users')->insert($users);
    }
}
