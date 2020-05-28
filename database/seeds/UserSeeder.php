<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Database\Factories\UserFactory;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //populate user table with easy data
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

        //add more users with random values using faker
        for($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker -> name,
                'email' => $faker -> unique() -> email,
                'password' => Hash::make($faker -> password)
            ]);
        }
        //try out factories
        factory(User::class, 50)->create();

    }
}
