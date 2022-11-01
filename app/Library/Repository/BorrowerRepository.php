<?php

namespace App\Library\Repository;

use App\Models\Borrower;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BorrowerRepository implements BorrowerRepositoryInterface
{

    /**
     * @param $borrowerID
     * @return array
     * @throws ModelNotFoundException
     */
    public function getBorrower( $borrowerID ): array
    {
        return Borrower::where('id', '=', $borrowerID)->firstOrFail()->toArray();
    }

    /**
     * @param $borrowerID
     * @return array
     * @throws ModelNotFoundException
     */
    public function getBankAccount($borrowerID): array
    {
        return $this->hasBankAccount($borrowerID) ? Borrower::where('id', '=', $borrowerID)->firstOrFail()->bankAccount->toArray(): [];
    }

    /**
     * @param $borrowerID
     * @return bool
     * @throws ModelNotFoundException
     */
    public function hasBankAccount($borrowerID): bool
    {
        return !is_null(Borrower::where('id', '=', $borrowerID)->firstOrFail()->bankAccount);
    }
}
