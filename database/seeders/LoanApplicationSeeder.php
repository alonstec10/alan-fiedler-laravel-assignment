<?php

namespace Database\Seeders;

use App\Models\LoanApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanApplication::factory()->create();
    }
}
