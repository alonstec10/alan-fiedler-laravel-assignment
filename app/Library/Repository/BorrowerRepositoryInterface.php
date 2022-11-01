<?php

namespace App\Library\Repository;

interface BorrowerRepositoryInterface
{



    /**
     * @param $borrowerID
     * @return array
     */
    public function getBorrower( $borrowerID ):array;

    /**
     * @param $borrowerID
     * @return array
     */
    public function getBankAccount( $borrowerID ): array;

    /**
     * @param $borrowerID
     * @return bool
     */
    public function hasBankAccount( $borrowerID) : bool;

}
