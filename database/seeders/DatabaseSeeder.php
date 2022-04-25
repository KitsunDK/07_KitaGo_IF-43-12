<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory(5)->create();
        \App\Models\PenyediaJasa::factory(5)->create();
        \App\Models\Admin::factory(5)->create();
        \App\Models\Wisata::factory(5)->create();
        \App\Models\Penginapan::factory(5)->create();
    }
}
