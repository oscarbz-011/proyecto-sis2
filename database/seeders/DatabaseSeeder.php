<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DatesSeeder::class);

         //\App\Models\User::factory(5)->create();

         /*\App\Models\User::factory()->create([
             'username' => 'Test User',
             'email' => 'test@example.com',
         ])->assignRole('cliente');
            */
    }
}
