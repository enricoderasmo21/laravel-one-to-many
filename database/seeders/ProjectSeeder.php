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
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++ ){

            $project = new Project();

            $project->title = $faker->sentence(2);
            $project->description = $faker->text(400);
            $project->image = $faker->imageUrl(640, 480, 'website', true);
            $project->creation_date = $faker->date();
            $project->techs = $faker->word(1);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        };
    }
}
