<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FakeTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\ru_RU\Text($faker));
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i=1; $i<=4; $i++){ //Cupboard
            $max=rand(1,4);
            $id= DB::table('archive_boards')->insertGetId([
                'name'=>rand(1,100).'-archive'
            ]);
            for ($j=1; $j<=$max; $j++){//Fields
                $id_field= DB::table('fields')->insertGetId([
                    'name'=>$j.'-field',
                    'archive_board_id'=>$id
                ]);
                $max_folder=rand(1,15);
                for ($k=1; $k<=$max_folder; $k++) {//Folder
                    $id_folder=   DB::table('folders')->insertGetId([
                        'name'=>Str::random(10),
                        'field_id'=>$id_field
                    ]);
                    $max_file=rand(1,15);
                    for ($file=1; $file<=$max_file; $file++)
                        DB::table('files')->insert([
                            'name'=>$faker->name(),
                            'text'=>$faker->realText(100,2),
                            'folder_id'=>$id_folder
                        ]);
                }
            }

        }

    }
}
