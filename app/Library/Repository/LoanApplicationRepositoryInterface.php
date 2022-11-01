<?php

namespace App\Library\Repository;

interface LoanApplicationRepositoryInterface
{
    public function getApplication( $applicationID ):array;

    public function getApplicationBorrowers( $applicationID ): array;

    public function hasBorrowers( $applicationID ): bool;
}
