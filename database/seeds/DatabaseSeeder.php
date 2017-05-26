<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(HouseSeed::class);
        $this->call(BillSeed::class);
        $this->call(DocumentSeed::class);
        $this->call(MessageSeed::class);
        $this->call(TaskSeed::class);

    }
}
