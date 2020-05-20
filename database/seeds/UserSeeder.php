<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Professor Oak',
            'email'=>'oakboi@yahoo.com',
            'password'=>'oaky'
        ]);
        DB::table('users')->insert([
            'name' => 'Brock',
            'email'=>'theunofficialrock@gmail.com',
            'password'=>'BIG'
        ]);
        DB::table('users')->insert([
            'name' => 'Misty',
            'email'=>'mistymist@yahoo.com',
            'password'=>'wshhh'
        ]);
        DB::table('users')->insert([
            'name' => 'Ash Ketchum',
            'email'=>'ogash@gmail.com',
            'password'=>'l0vepik@chu'
        ]);
    }
}
