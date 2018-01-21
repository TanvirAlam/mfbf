<?php

use Illuminate\Database\Seeder;
use App\Models\Groups;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->truncate();

        $groups = [
            'Home Expense',
            'Transportation',
            'Food',
            'Utilities',
            'Medical',
            'Insurance',
            'Personal',
            'Education',
            'Savings',
            'Gifts/Donations',
            'Entertainment',
            'Income',
            'Daily living',
            'Obligations',
            'Subscriptions',
            'Miscellaneous'
        ];

        foreach ($groups as $group) {
            Groups::create(['name' => $group]);
        }
    }
}
