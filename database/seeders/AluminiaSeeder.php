<?php

namespace Database\Seeders;

use App\Models\Aluminia;
use Illuminate\Database\Seeder;

class AluminiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aluminia::factory()->create([
            'name'=> 'Kelvin Ampong Kwakyi',
        ]);
        Aluminia::factory()->create([
            'name'=> 'Millicent Osei',
        ]);
        Aluminia::factory()->create([
            'name'=> 'Paulina Anfild Oko',
        ]);
    }
}
