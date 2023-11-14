<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;


class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tech = ['HTML', 'CSS', 'Javascript', 'Vue.js', 'PHP', 'Laravel', 'Bootstrap', 'MySQL'];

        foreach ($tech as $t) {
            $new_technology = new Technology();
            $new_technology->name = $t;
            $new_technology->save();
        }
    }
}
