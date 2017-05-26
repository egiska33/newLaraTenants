<?php

use Illuminate\Database\Seeder;

class BillSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'type' => 'Nuoma', 'total' => '300.00', 'house_id' => 1,],
            ['id' => 2, 'type' => 'Mokesciai', 'total' => '123.00', 'house_id' => 1,],
            ['id' => 3, 'type' => 'Kiti', 'total' => '23.00', 'house_id' => 1,],
            ['id' => 4, 'type' => 'Nuoma', 'total' => '250.00', 'house_id' => 2,],
            ['id' => 5, 'type' => 'Mokesciai', 'total' => '112.00', 'house_id' => 2,],
            ['id' => 6, 'type' => 'Nuoma', 'total' => '180.00', 'house_id' => 3,],
            ['id' => 7, 'type' => 'Mokesciai', 'total' => '127.00', 'house_id' => 3,],
            ['id' => 8, 'type' => 'Nuoma', 'total' => '400.00', 'house_id' => 4,],
            ['id' => 9, 'type' => 'Kiti', 'total' => '12.00', 'house_id' => 4,],
            ['id' => 10, 'type' => 'Mokesciai', 'total' => '111.00', 'house_id' => 4,],
            ['id' => 11, 'type' => 'Nuoma', 'total' => '100.00', 'house_id' => 5,],
            ['id' => 12, 'type' => 'Mokesciai', 'total' => '234.00', 'house_id' => 5,],
            ['id' => 13, 'type' => 'Nuoma', 'total' => '80.00', 'house_id' => 6,],
            ['id' => 14, 'type' => 'Mokesciai', 'total' => '132.00', 'house_id' => 6,],

        ];

        foreach ($items as $item) {
            \App\Bill::create($item);
        }
    }
}
