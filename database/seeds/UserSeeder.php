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
        //add a few sample records to user table
        DB::table('users')->insert([
            'name' => 'Professor Oak',
            'email'=>'oakboi@yahoo.com',
            'password'=>Hash::make('oaky')
        ]);
        DB::table('users')->insert([
            'name' => 'Brock',
            'email'=>'theunofficialrock@gmail.com',
            'password'=>Hash::make('BIG')
        ]);
        DB::table('users')->insert([
            'name' => 'Misty',
            'email'=>'mistymist@yahoo.com',
            'password'=>Hash::make('wshhh')
        ]);
        DB::table('users')->insert([
            'name' => 'Ash Ketchum',
            'email'=>'ogash@gmail.com',
            'password'=>Hash::make('l0vepik@chu')
        ]);
    }
}
