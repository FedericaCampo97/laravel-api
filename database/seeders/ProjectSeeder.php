<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->realText(50);
            $project->cover_image = 'placeholders/' . $faker->image('public/storage/placeholders', category: 'Project', fullPath: false);
            $project->slug = Str::slug($project->title, '-');
            $project->content = $faker->realText();
            $project->type_id = $faker->numberBetween(1, 3);
            $project->save();
        }
    }
}
