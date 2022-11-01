<?php

namespace App\Library\Repository;

use App\Models\LoanApplication;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LoanApplicationRepository implements LoanApplicationRepositoryInterface
{

    /**
     * @param $applicationID
     * @return array
     * @throws ModelNotFoundException
     */
    public function getApplication($applicationID): array
    {
        return LoanApplication::where('id', '=', $applicationID)->firstOrFail()->toArray();
    }

    /**
     * @param $applicationID
     * @return array
     * @throws ModelNotFoundException
     */
    public function getApplicationBorrowers($applicationID): array
    {
        return LoanApplication::where('id', '=', $applicationID)->firstOrFail()->borrowers->toArray();
    }

    /**
     * @param $applicationID
     * @return bool
     */
    public function hasBorrowers($applicationID): bool
    {
        $borrows = [];
        try {
            $borrows = $this->getApplicationBorrowers($applicationID);
        } catch (ModelNotFoundException $exception) {
            //var_dump($borrows);

        }

        return count($borrows) > 0;
    }
}
