<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\TagSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categoriesSeeder::class);
        $this->call(TagSeeder::class);
    }
}
