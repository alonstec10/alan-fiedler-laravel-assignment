<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Borrower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $borrowers = Borrower::make()->get();

        foreach($borrowers as $borrower) {
            BankAccount::factory()->create([
                'borrower_id' => $borrower->id,
                'bank_account_number' => fake()->iban(),
                'annual_income' => fake()->randomNumber(6),
            ]);
        }
    }
}
