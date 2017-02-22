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
        'name' => 'Dries Peeters',
        'password' => bcrypt('Broes007!'),
        'address' => 'Rubensstraat 137 2550 Kontich Belgie',
        'email' => 'dries.peeters96@gmail.com',
        'function' => 'Admin',
        'department' => 'None',
        'telephone' => '+32493710003',
      ]);
    }
}
