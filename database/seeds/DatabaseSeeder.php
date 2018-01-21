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
        $this->call([
            'GroupSeeder',
            'CategorySeeder'
        ]);

        $this->command->info('Data seeded!');
    }
}
