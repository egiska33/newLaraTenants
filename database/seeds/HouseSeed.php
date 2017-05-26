<?php

use Illuminate\Database\Seeder;

class HouseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'landlord_id' => 2, 'tenant_id' => 5, 'city' => 'Vilnius', 'address' => 'Gedimino pr.11',],
            ['id' => 2, 'landlord_id' => 3, 'tenant_id' => 6, 'city' => 'Vilnius', 'address' => 'Taikos g. 123-5',],
            ['id' => 3, 'landlord_id' => 3, 'tenant_id' => 7, 'city' => 'Kaunas', 'address' => 'Savanoriu pr. 34-45',],
            ['id' => 4, 'landlord_id' => 4, 'tenant_id' => 8, 'city' => 'Vilnius', 'address' => 'Sevcenkos g. 2-11',],
            ['id' => 5, 'landlord_id' => 4, 'tenant_id' => 9, 'city' => 'Kaunas', 'address' => 'Medvegalio g.11-34',],
            ['id' => 6, 'landlord_id' => 4, 'tenant_id' => 10, 'city' => 'Alytus', 'address' => 'Vilniaus g. 34-1',],

        ];

        foreach ($items as $item) {
            \App\House::create($item);
        }
    }
}
