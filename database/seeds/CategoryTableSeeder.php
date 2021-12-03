<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['italiano', 'internazionale', 'asiatica', 'cinese', 'giapponese', 'vietnamita','indiano', 'pesce', 'carne', 'pizza' ];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
