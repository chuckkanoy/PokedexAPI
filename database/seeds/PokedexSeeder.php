<?php

use Illuminate\Database\Seeder;

class PokedexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //open csv file and read it
        if (($handle = fopen(public_path() . '/pokedex.csv', 'r')) !== FALSE) {
            //skip first row
            fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== FALSE) {
                //populate table with seeder values
                DB::table('pokemon')->insert([
                    'id' => $data[0],
                    'name' => $data[1],
                    'types' => $data[2],
                    'height' => $data[3],
                    'weight' => $data[4],
                    'abilities' => $data[5],
                    'egg_groups' => $data[6],
                    'stats' => $data[7],
                    'genus' => $data[8],
                    'description' => $data[9],
                ]);

            }
        }
        fclose($handle);
    }
}
