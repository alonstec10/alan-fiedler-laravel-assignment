<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\LoanApplication;
use Illuminate\Database\Seeder;
use App\Models\BorrowerApplication as BorrowerApplicationModel;

class BorrowerApplication extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $borrowers = Borrower::make()->get();
        $application = LoanApplication::make()->first();



        foreach( $borrowers as $borrower ) {
            BorrowerApplicationModel::factory()->create([
                'borrower_id' => $borrower->id,
                'loan_application_id' => $application->id
            ]);
        }

    }
}
