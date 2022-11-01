<?php

namespace App\Library;

use App\Library\Repository\BorrowerRepositoryInterface;
use App\Library\Repository\LoanApplicationRepositoryInterface;

class Application
{
    /**
     * @var BorrowerRepositoryInterface
     */
    private BorrowerRepositoryInterface $borrowerRepository;
    /**
     * @var LoanApplicationRepositoryInterface
     */
    private LoanApplicationRepositoryInterface $loanApplicationRepository;

    public function __construct(BorrowerRepositoryInterface $borrowerRepository, LoanApplicationRepositoryInterface $applicationRepository)
    {
        $this->borrowerRepository = $borrowerRepository;
        $this->loanApplicationRepository = $applicationRepository;
    }

    /**
     * @param $applicationID
     * @return array
     */
    public function getApplication( $applicationID ): array
    {
        $applicationData = [];
        $applicationData['application'] = $this->getLoanApplicationRepository()->getApplication($applicationID);
        $applicationData['borrowers'] = $this->getLoanApplicationRepository()->getApplicationBorrowers($applicationID);
        return $applicationData;
    }


    /**
     * @return BorrowerRepositoryInterface
     */
    public function getBorrowerRepository(): BorrowerRepositoryInterface
    {
        return $this->borrowerRepository;
    }

    /**
     * @return LoanApplicationRepositoryInterface
     */
    public function getLoanApplicationRepository(): LoanApplicationRepositoryInterface
    {
        return $this->loanApplicationRepository;
    }





}
