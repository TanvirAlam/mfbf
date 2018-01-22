<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use League\Csv\Reader;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        foreach (Reader::createFromPath(storage_path('datafiles/categories.csv')) as $row) {
            Category::create([
                'group_id' => $row[1],
                'name' => $row[2]
            ]);
        }
    }
}
