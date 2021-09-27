<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Uuid::uuid4()->toString();
        $user = [
            [
                'id' => $id,
                'name' => 'Pikih alan',
                'email' => 'admin@gmail.com',
                'role' => '1',
                'image' => 'default.jpg',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => $id,
                'name' => 'Pikih alan - User',
                'email' => 'user@gmail.com',
                'role' => '2',
                'image' => 'default.jpg',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        foreach ($user as $key => $value) {
            DB::table('users')->insert($value);
        }
    }
}
