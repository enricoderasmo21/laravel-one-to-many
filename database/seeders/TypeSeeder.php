<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Front End', 'Back End', 'Full Stack'];

        foreach($types as $type){

            $NewType = new Type();

            $NewType->name = $type;
            $NewType->description = $faker->text(100);
            $NewType->slug = Str::slug($NewType->name, '-');

            $NewType->save();
        }
    }
}
