<?php

use Illuminate\Database\Seeder;



class LocksTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $runs = 20;
        for($i = 0; $i < $runs; $i++)
        {
          DB::table('locks')->insert([
            'room' => $this->generateRandomRoom(),
            'password' => str_random(10),
            'address' => str_random(20)
          ]);
        }
    }

    public function generateRandomRoom()
    {
      $room = str_random(1);
      for($i = 0; $i < 4; $i++) {
        $room .= mt_rand(0, 9);
      }
      return $room;
    }
}
