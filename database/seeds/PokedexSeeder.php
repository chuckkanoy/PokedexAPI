<?php

use Illuminate\Database\Seeder;
use App\Pokemon;
use App\Ability;
use App\Type;
use App\EggGroup;
use App\Stats;

class PokedexSeeder extends Seeder
{

    /**
     * Turn raw string into usable array
     *
     * @param $value
     * @return false|string[]
     */
    private function clean($value){
        return explode(',',str_replace(["{", "}","[","]","\"", " "],'',$value));
    }

    /**
     * Iterate through desired property and add to minimized array for later use
     *
     * @param $column
     * @return array
     */
    private function getFromColumnName($column){
        //initialize local variables for use
        $minimized = [];
        $i = 0;

        $file=fopen(public_path() . '/pokedex.csv', 'r');

        //get appropriate column from first line
        $index = 0;
        $firstFromFile = fgetcsv($file);
        $first = $firstFromFile;
        foreach($first as $one) {
            if(strcmp($one,$column)===0){
                $index = $i;
            }
            $i++;
        }

        $i = 0;
        //handle whole file
        while(! feof($file)) {
            while (($data = fgetcsv($file)) !== FALSE) {

                //clean data from column
                $useArray = $this->clean($data[$index]);
                foreach ($useArray as $use) {
                    if (!in_array($use, $minimized, true)) {
                        $minimized[$i++] = $use;
                    }
                }
            }
        }
        return $minimized;
    }

    /**
     * insert specified column into specified table
     *
     * @param $minimized
     * @param $table
     */
    private function insertToTable($table){
        $minimized = $this->getFromColumnName($table);
        //use minimized array to add table entries
        foreach($minimized as $single) {
            DB::table($table)->insert([
                'name'=>$single
            ]);
        }
    }

    /**
     * Populate the pivot tables from provided columns
     *
     * @param $column
     * @param $table
     */
    private function getAndInsert($table){
        $this->insertToTable($table);
    }

    private function attachTables($class, $column) {

    }

    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        //create and populate tables associated with pokemon
        $this->getAndInsert('types');
        $this->getAndInsert('abilities');
        $this->getAndInsert('egg_groups');

        //populate pokemon table from csv and add relationships
        if (($handle = fopen(public_path() . '/pokedex.csv', 'r')) !== FALSE) {
            //skip first row
            fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== FALSE) {
                //add current pokemon to DB table
                DB::table('pokemon')->insert([
                    'id' => $data[0],
                    'name' => $data[1],
                    'height' => $data[3],
                    'weight' => $data[4],
                    'stats' => $data[7],
                    'genus' => $data[8],
                    'description' => $data[9],
                ]);

                //store current pokemon's data in an object
                $pokemon = Pokemon::find($data[0]);

                //populate pivot tables using relationships
                $cleaned = $this->clean($data[2]);
                foreach($cleaned as $oneClean){
                    $pokemon->types()->attach(Type::where('name', $oneClean)->select('id')->get());
                }

                $cleaned = $this->clean($data[5]);
                foreach($cleaned as $oneClean){
                    $pokemon->egg_groups()->attach(Ability::where('name', $oneClean)->select('id')->get());
                }

                $cleaned = $this->clean($data[6]);
                foreach($cleaned as $oneClean){
                    $pokemon->abilities()->attach(EggGroup::where('name', $oneClean)->select('id')->get());
                }
            }
        }
        fclose($handle);
    }
}
