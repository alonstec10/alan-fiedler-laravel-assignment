<?php

namespace Database\Seeders;

use App\Models\Borrower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrower::create(['name' => fake()->name, 'is_employed' => 1]);
        Borrower::create(['name' => fake()->name, 'is_employed' => 0]);



    }
}