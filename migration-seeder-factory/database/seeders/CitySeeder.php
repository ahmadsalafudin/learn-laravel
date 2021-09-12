<?php

namespace Database\Seeders;

use App\Models\City;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value) {
            DB::table('cities')->insert([
                'name' => $faker->country,
                'address' => $faker->address,
            ]);
        }
    }
}
