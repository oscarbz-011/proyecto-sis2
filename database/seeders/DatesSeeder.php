<?php

namespace Database\Seeders;

use App\Models\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Date::create([
            'id_date' => '1',
            'day' => 'lunes',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);
        Date::create([
            'id_date' => '2',
            'day' => 'martes',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);
        Date::create([
            'id_date' => '3',
            'day' => 'miercoles',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);
        Date::create([
            'id_date' => '4',
            'day' => 'jueves',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);
        Date::create([
            'id_date' => '5',
            'day' => 'viernes',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);
        Date::create([
            'id_date' => '6',
            'day' => 'sabado',
            'hour' => '08:30:05',
            'updated_at' => NULL,
        ]);

    }
}
