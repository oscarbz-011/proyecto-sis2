<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('admin');

        User::create([
            'username' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('cliente');



    }
}
