<?php

use Illuminate\Database\Seeder;
use App\Pokemon;
use App\Ability;
use App\Type;
use App\EggGroup;

class PokedexSeeder extends Seeder
{
    /**
     * Turn raw string into usable array
     *
     * @param $value
     * @return false|string[]
     */
    public function clean($value){
        return explode(',',str_replace(["[","]","\"", " "],'',$value));
    }

    /**
     * return filtered data from specified column
     *
     * @param $index
     */
    public function getFromColumn($column){
        //initialize local variables for use
        $minimized = [];
        $i = 0;

        $file=fopen(public_path() . '/pokedex.csv', 'r');

        //pass over first line
        fgetcsv($file);

        //handle whole file
        while(! feof($file)) {
            while (($data = fgetcsv($file)) !== FALSE) {

                //clean data from column
                $useArray = $this->clean($data[$column]);
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
    public function insertToTable($minimized, $table){
        foreach($minimized as $single) {
            DB::table($table)->insert([
                'name'=>$single
            ]);
        }
    }

    /**
     * perform both get and insert function in one method
     *
     * @param $column
     * @param $table
     */
    public function getAndInsert($column, $table){
        $this->insertToTable($this->getFromColumn($column), $table);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //populate types table with seeder values
        $this->getAndInsert(2, 'types');
        //populate abilities
        $this->getAndInsert(5, 'abilities');
        //populate egg groups
        $this->getAndInsert(6, 'egg_groups');
        //open csv file and read it
        if (($handle = fopen(public_path() . '/pokedex.csv', 'r')) !== FALSE) {
            //skip first row
            fgetcsv($handle);
            while (($data = fgetcsv($handle)) !== FALSE) {
                //populate pokemon
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
                //create new pokemon
                $pokemon = Pokemon::find($data[0]);
                //populate pokemon types pivot table
                $cleaned = $this->clean($data[2]);
                foreach($cleaned as $oneClean){
                    $pokemon->types()->attach(Type::where('name', $oneClean)->select('id')->get());
                }

                //populate pokemon abilities pivot table
                $cleaned = $this->clean($data[5]);
                foreach($cleaned as $oneClean){
                    $pokemon->egg_groups()->attach(Ability::where('name', $oneClean)->select('id')->get());
                }

                //populate pokemon egg groups pivot table
                $cleaned = $this->clean($data[6]);
                foreach($cleaned as $oneClean){
                    $pokemon->abilities()->attach(EggGroup::where('name', $oneClean)->select('id')->get());
                }
            }
        }
        fclose($handle);
    }
}
