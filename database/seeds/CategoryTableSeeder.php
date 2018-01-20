<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use League\Csv\Reader;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $file = storage_path('datafiles/categories.csv');
        $csv = Reader::createFromPath($file);

        foreach ($csv as $row) {
            Category::create(['group_id' => $row[1], 'name' => $row[2]]);
        }
    }
}
