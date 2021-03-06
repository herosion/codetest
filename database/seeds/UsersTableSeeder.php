<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create();

   		DB::table('users')->insert([
                [
                    'username' => 'Benjamin',
                    'email'    => 'ben@hot.fr',
                    'password' => bcrypt('secret')
                ],

        ]);
    }
}
