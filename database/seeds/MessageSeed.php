<?php

use Illuminate\Database\Seeder;

class MessageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'content' => 'Laba diena reikia susitikti', 'house_id' => 1, 'user_id' => 2, 'created_by_id' => null,],
            ['id' => 2, 'content' => 'Galim susitikti pirmadieni', 'house_id' => 1, 'user_id' => 5, 'created_by_id' => null,],
            ['id' => 3, 'content' => 'Nesumoketa nuoma ', 'house_id' => 2, 'user_id' => 3, 'created_by_id' => null,],
            ['id' => 4, 'content' => 'Sumokesiu kita savaite', 'house_id' => 2, 'user_id' => 6, 'created_by_id' => null,],
            ['id' => 5, 'content' => 'Labas vakaras kaip sekasi', 'house_id' => 3, 'user_id' => 3, 'created_by_id' => null,],
            ['id' => 6, 'content' => 'Viskas gerai', 'house_id' => 3, 'user_id' => 7, 'created_by_id' => null,],
            ['id' => 7, 'content' => 'Kada galim susitikti', 'house_id' => 4, 'user_id' => 4, 'created_by_id' => null,],
            ['id' => 8, 'content' => 'Sia savaite nebusiu', 'house_id' => 4, 'user_id' => 8, 'created_by_id' => null,],
            ['id' => 9, 'content' => 'Kada sumokesite nuoma', 'house_id' => 5, 'user_id' => 4, 'created_by_id' => null,],
            ['id' => 10, 'content' => 'Sumokejau vakar ', 'house_id' => 5, 'user_id' => 9, 'created_by_id' => null,],
            ['id' => 11, 'content' => 'Norim issikelti po menesio', 'house_id' => 6, 'user_id' => 10, 'created_by_id' => null,],
            ['id' => 12, 'content' => 'Reikia susitarti del perdavimo', 'house_id' => 6, 'user_id' => 4, 'created_by_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Message::create($item);
        }
    }
}
