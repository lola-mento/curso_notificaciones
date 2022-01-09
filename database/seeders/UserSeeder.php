<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Andres Leon',
                'email' => 'andresleon90s@gmail.com',
                'password' => bcrypt('123')
            ]
            );
            User::factory(10)->create();
    }
}
