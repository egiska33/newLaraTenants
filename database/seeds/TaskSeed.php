<?php

use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'content' => 'Sugedo skalbimo masina', 'photo' => null, 'house_id' => 1,],
            ['id' => 2, 'content' => 'Kaimynai uzpyle lubas', 'photo' => null, 'house_id' => 2,],
            ['id' => 3, 'content' => 'Sutvarkiau vonios krana', 'photo' => null, 'house_id' => 2,],
            ['id' => 4, 'content' => 'Neveikia saldytuvas', 'photo' => null, 'house_id' => 3,],
            ['id' => 5, 'content' => 'Reikalingas duru remontas', 'photo' => null, 'house_id' => 4,],
            ['id' => 6, 'content' => 'Iskviestas santechnikas ir sutvarkytas lasantis kranas', 'photo' => null, 'house_id' => 5,],
            ['id' => 7, 'content' => 'Nupirkta skalbimo masina, prasau sumazinti nuoma', 'photo' => null, 'house_id' => 6,],

        ];

        foreach ($items as $item) {
            \App\Task::create($item);
        }
    }
}
